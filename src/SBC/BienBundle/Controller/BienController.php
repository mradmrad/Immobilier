<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Form\BienType;
use SBC\BienBundle\Form\EquipementType;
use SBC\TiersBundle\Entity\Client;
use SBC\TiersBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BienController
 * @package SBC\BienBundle\Controller
 */
class BienController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $biens = $em->getRepository('BienBundle:Bien')->getAll(Bien::RECHERCHE, null, $request->request->get('rueID'));

        if ($request->request->get('rueID') == null) {
            $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
            return $this->render('@Bien/Bien/index.html.twig', array('biens' => $biens
            ,'gouvernorats'=>$gouvernorats
            ));
        } else {

            return new JsonResponse(json_decode(json_encode($biens)));
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $biens = $em->getRepository('BienBundle:Bien')->getAllTypes($request->request->get('rueID'));

        if ($request->request->get('rueID') == null) {
            $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
            return $this->render('@Bien/BaseDeDonnee/index.html.twig', array('biens' => $biens,'gouvernorats'=> $gouvernorats));
        } else {
            return new JsonResponse(json_decode(json_encode($biens)));
        }
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $client = new Client();
        $bien = new Bien();
        $bien->setType(Bien::RECHERCHE);
        $bien->setCreatedBy($this->getUser()->getPersonnel());
        $bien->setDescription(' ');
        $clientform = $this->createForm(ClientType::class,$client);
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bien);
            $em->flush();

            return $this->redirectToRoute('bien_index');
        }

        $em = $this->getDoctrine()->getManager();
        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();

        $equipement = new Equipement();
        $formEquipement = $this->createForm(EquipementType::class, $equipement);
        $formEquipement->handleRequest($request);

        return $this->render('@Bien/Bien/new.html.twig', array(
            'bien' => $bien,
            'gouvernorats' => $gouvernorats,
            'form' => $form->createView(),
            'formEquipement' => $formEquipement->createView(),
            'clientform' => $clientform->createView()
        ));
    }

    /**
     * @param Bien $bien
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Bien $bien)
    {
        return $this->render('@Bien/Bien/show.html.twig', array(
            'bien' => $bien,

        ));
    }

    /**
     * @param Request $request
     * @param Bien $bien
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, Bien $bien)
    {
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm(BienType::class, $bien);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            foreach ($editForm->get('pictures')->getData() as $picture) {
                if ($picture->getDescription() == null) {
                    $bien->removePicture($picture);
                    $em->remove($picture);
                } else {
                    $bien->addPicture($picture);
                }
            }

            foreach ($bien->getProcurations() as $procuration) {
                if ($procuration->getClient() == null) {
                    $bien->removeProcuration($procuration);
                    $em->remove($procuration);
                } else {
                    $bien->addProcuration($procuration);
                }
            }
//            foreach ($bien->getRepresentants() as $representant) {
//                if ($representant->getClient() == null) {
//                    $bien->removeRepresentant($representant);
//                    $em->remove($representant);
//                } else {
//                    $bien->addRepresentant($representant);
//                }
//            }

            foreach ($bien->getOwners() as $owner) {
                if ($owner->getClient() == null) {
                    $bien->removeOwner($owner);
                    $em->remove($owner);
                } else {
                    $bien->addOwner($owner);
                }
            }

            $em->persist($bien);
            $em->flush();
            return $this->redirectToRoute('bien_index');
        }

        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();

        return $this->render('@Bien/Bien/edit.html.twig', array(
            'bien' => $bien,
            'gouvernorats' => $gouvernorats,
            'form' => $editForm->createView(),

        ));
    }

    /**
     * @param Bien $bien
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Bien $bien)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($bien);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

}
