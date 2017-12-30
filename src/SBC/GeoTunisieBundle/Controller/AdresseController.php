<?php

namespace SBC\GeoTunisieBundle\Controller;

use SBC\GeoTunisieBundle\Entity\Adresse;
use SBC\GeoTunisieBundle\Entity\Rue;
use SBC\GeoTunisieBundle\Form\AdresseType;
use SBC\GeoTunisieBundle\Form\RueType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Adresse controller.
 *
 */
class AdresseController extends Controller
{
    /**
     * Lists all adresse entities.
     *
     */
    public function indexAction()
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository(Adresse::class)->findAll();

        return $this->render('@GeoTunisie/Adresse/index.html.twig', array(
            'adresses' => $adresses,
        ));
    }

    /**
     * Creates a new adresse entity.
     *
     */
    public function newAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $adresse = new Adresse();

        $em = $this->getDoctrine()->getManager();
        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();

        return $this->render('@GeoTunisie/Adresse/new.html.twig', array(
            'adresse' => $adresse,
            'gouvernorats' => $gouvernorats,


        ));
    }


    public function addAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $adresse = new Adresse();
        $em = $this->getDoctrine()->getManager();
        $rue = $em->getRepository("GeoTunisieBundle:Rue")->findOneBy(array('id' =>$request->request->get('rue')) );

        $adresse->setRue($rue);
        $adresse->setName($request->request->get('adresse'));

        $success = true;
        $message= '';

        try {
            $em->persist($adresse);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message, 'id' => $adresse->getId(), 'adresseName' => $adresse->getName()));
    }

    /**
     * Finds and displays a adresse entity.
     *
     */
    public function showAction(Adresse $adresse)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('@GeoTunisie/Adresse/show.html.twig', array(
            'adresse' => $adresse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adresse entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $adresse = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Adresse')
            ->findOneBy(array('id' => $id));


        $adresse->setName($request->request->get('newname'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($adresse);
        $em->flush();

        $success = true;

        if ($adresse === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * Deletes a adresse entity.
     *
     */
    public function deleteAction(Adresse $adresse)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') ) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($adresse);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * Creates a form to delete a adresse entity.
     *
     * @param Adresse $adresse The adresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresse $adresse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresse_delete', array('id' => $adresse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



    public function getAdresseByNameAndRueAction($name, $rue)
    {

        $adresse = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Adresse')
            ->findOneBy(array('name' => $name, 'rue' => $rue));

        $success = true;

        if ($adresse === null)
            $success = false;

        return new JsonResponse(array('success' => $success));

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function byRueAction(Request $request)
    {
        $reg = $request->request->get('q'); //---get the reg of search (GET)
        $manager = $this->getDoctrine()->getManager();
        $rue = $manager->getRepository('GeoTunisieBundle:Rue')->find($reg);
        $searchRes = $manager->getRepository('GeoTunisieBundle:Adresse')->findBy(array('rue' => $rue));

        $res = array();
        foreach ($searchRes as $adresse) {
            $res[] = array(
                'value' => $adresse->getId(),
                'text' => $adresse->getName(),
            );
        }

        return new JsonResponse($res);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function byRueNotJoinedAction(Request $request)
    {
        $reg = $request->request->get('q'); //---get the reg of search (GET)
        $manager = $this->getDoctrine()->getManager();
        $rue = $manager->getRepository('GeoTunisieBundle:Rue')->find($reg);
        $searchRes = $manager->getRepository('GeoTunisieBundle:Adresse')->getAdressesByRueNotJoined($rue);

        $res = array();
        foreach ($searchRes as $adresse) {
            $res[] = array(
                'value' => $adresse->getId(),
                'text' => $adresse->getName(),
            );
        }

        return new JsonResponse($res);
    }



    public function byNameAction($name)
    {
        $adresse = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Adresse')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($adresse === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listForAjaxAction()
    {

        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Adresse')->findAll();

        $res = array();
        foreach ($searchRes as $adresse) {
            $res[] = array(
                'value' => $adresse->getId(),
                'text' => $adresse->getName(),
            );
        }

        return new JsonResponse($res);
    }

}
