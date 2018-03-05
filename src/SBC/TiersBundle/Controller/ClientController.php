<?php

namespace SBC\TiersBundle\Controller;

use SBC\TiersBundle\Entity\Address;
use SBC\TiersBundle\Entity\Client;
use SBC\TiersBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Client controller.
 *
 * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR')or has_role('ROLE_SUPERVISEUR')or has_role('ROLE_WEB_MARKETING')")
 */
class ClientController extends Controller
{
    /**
     * Lists all client entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('TiersBundle:Client')->findAll();

        return $this->render('@Tiers/client/index.html.twig', array(
            'clients' => $clients,
        ));
    }

    /**
     * Creates a new client entity.
     *
     */
    public function newAction(Request $request)
    {
        $client = new Client();
        $mainAddress = new Address();
        $mainAddress->setTitle('Adresse principale');
        $client->setMainAddress($mainAddress);

        $form = $this->createForm('SBC\TiersBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($client->getAddresses() as $address) {
                $client->addAddress($address);
            }

            foreach ($client->getContacts() as $contact) {
                $client->addContact($contact);
            }

            $em = $this->getDoctrine()->getManager();
            $client->setCode("clt-".uniqid());
            $em->persist($client);
            $em->flush();

            $this->manageFlashBag($request, $client);

            return $this->redirectToRoute('client_index');
        } else {
            $this->manageFlashBag($request, null);
        }

        return $this->render('@Tiers/client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Manage flashbag after creating new client
     * @param Request $request
     * @param Client $client
     */
    private function manageFlashBag(Request $request, Client $client = null)
    {
        $flashKey = 'success_add_client';
        $flashBagContent = null;
        if ($client != null) {
            $flashBagContent = '<script>
                                    UIkit.notify({
                                        message: "Le client \"' . $client->getDenomination() . '\" a été ajouté avec succès",
                                        timeout: \'3000\'
                                    });
                                </script>';


        } else {
            $flashBagContent = null;
        }
        $session = $request->getSession();
        if ($session->getFlashBag()->get('success_add_client') != null) {
            $session->getFlashBag()->set($flashKey, $flashBagContent);
        } else {
            $session->getFlashBag()->add($flashKey, $flashBagContent);
        }
    }

    /**
     * Finds and displays a client entity.
     */
    public function showAction($code)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('TiersBundle:Client')->find($code);
        $deleteForm = $this->createDeleteForm($client);

        $histories = $em->getRepository('BienBundle:History')->ClientHistory($client);
        return $this->render('@Tiers/client/show.html.twig', array(
            'client' => $client,
            'delete_form' => $deleteForm->createView(),
            'histories'=>$histories
        ));
    }

    /**
     * Displays a form to edit an existing client entity.
     *
     */
    public function editAction(Request $request, $code)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->find($code);
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('SBC\TiersBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);
        $histories = $em->getRepository('BienBundle:History')->ClientHistory($client);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $updateDate = new \DateTime("now", new \DateTimeZone('Etc/GMT'));
            $client->setDateUpdate($updateDate);

            foreach ($editForm->get('addresses')->getData() as $address) {
                if ($address->getTitle() == null) {
                    $client->removeAddress($address);
                    $em->remove($address);
                } else {
                    $client->addAddress($address);
                }
            }

            foreach ($editForm->get('contacts')->getData() as $contact) {
                if ($contact->getDenomination() == null) {
                    $client->removeContact($contact);
                    $em->remove($contact);
                } else {
                    $client->addContact($contact);
                }
            }


            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_show', array('code' => $client->getCode()));
        }

        return $this->render('@Tiers/client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'histories'=>$histories
        ));
    }

    /**
     * Deletes a client entity.
     */
    public function deleteAction($code)
    {
        $client = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->find($code);
        $em = $this->getDoctrine()->getManager();

        foreach ($client->getAddresses() as $address) {
            $em->remove($address);
            $em->flush();
        }

        foreach ($client->getContacts() as $contact) {
            $em->remove($contact);
            $em->flush();
        }

        $em->remove($client);
        $em->flush();

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a client entity.
     *
     * @param Client $client The client entity
     *
     * @return \Symfony\Component\Form\Form The form
     *
     */
    private function createDeleteForm(Client $client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('code' => $client->getCode())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function checkCodeAction($code)
    {
        $client = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->find($code);

        $res = null;

        if ($client == null) {
            $res = array(
                'exist' => false,
            );
        } else {
            $res = array(
                'exist' => true,
                'client' => $client->getDenomination(),
            );
        }

        return new JsonResponse($res);
    }

    /**
     * Lists all remind entities.
     *
     */
    public function listAction()
    {

        $clients = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->findAll();

        $liste = array();
        foreach ($clients as $client) {
            $liste[] = array(
                'text' => $client->getDenomination().' '.$client->getPrenom(),
                'value' => $client->getCode(),
                'numero' => $client->getTel()
            );
        }

        return new JsonResponse($liste);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        $client = new Client();
        $form__ = $this->createForm(ClientType::class ,$client);
        $form__->handleRequest($request);
        if ($form__->isSubmitted())

        {
            $em = $this->getDoctrine()->getManager();
            $client->setCode("clt-".uniqid());
            $em->persist($client);
            $em->flush();

        }


        return new JsonResponse($client);






        $success = true;
        $message = '';


        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $client->getCode(),
            'clientName' => $client->getDenomination()
        ));
    }
}
