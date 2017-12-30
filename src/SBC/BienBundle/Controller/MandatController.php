<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Acquisition;
use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\Mandat;
use SBC\BienBundle\Form\MandatType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Class MandatController
 * @package SBC\BienBundle\Controller
 */
class MandatController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $mandats = $this->getDoctrine()->getManager()->getRepository('BienBundle:Mandat')
            ->findAll($request->request->get('rueID'), Mandat::EN_COURS);

        if ($request->request->get('rueID') == null) {
            $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
            return $this->render('@Bien/Mandat/index.html.twig',
                array('mandats' => $mandats,
                    'gouvernorats'=>$gouvernorats
                ));
        } else {
            return new JsonResponse(json_decode(json_encode($mandats)));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function transfertAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if ($id === '') {
            throw $this->createNotFoundException("Vous avez passé des données eronnées.");
        }
        $acquisition = $em->getRepository('BienBundle:Acquisition')->find($id);
        if (null === $acquisition) {
            throw new NotFoundHttpException("L'acquisition d'id " . $acquisition->getId() . " n'existe pas.");
        }

        $mandat = new Mandat();
        $mandat->setAcquisition($acquisition);

        $form = $this->createForm(MandatType::class, $mandat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mandat->getAcquisition()->getBien()->setType(Bien::MANDAT);
            $mandat->getAcquisition()->setStatus(Acquisition::SUCCES);
            $mandat->setEtatMandat(Mandat::EN_COURS);
            $em->persist($mandat);
            $em->flush();

            return $this->redirectToRoute('mandat_show', array('id' => $mandat->getId()));
        }

        return $this->render('BienBundle:Mandat:transfert.html.twig', array(
            'mandat' => $mandat,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $mandat = new Mandat();

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(MandatType::class, $mandat);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
//            die(var_dump($mandat->getAcquisition()->getBien()->getFormeTerrain()));
            $mandat->getAcquisition()->getBien()->setCreatedBy($this->getUser()->getPersonnel());
            $mandat->getAcquisition()->getBien()->setType(Bien::MANDAT);
            $mandat->getAcquisition()->setStatus(Acquisition::SUCCES);
            $em = $this->getDoctrine()->getManager();
            $em->persist($mandat);
            $em->flush();

            return $this->redirectToRoute('mandat_index');
        }
        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
        return $this->render('@Bien/Mandat/new.html.twig', array(
            'mandat' => $mandat,
            'gouvernorats' => $gouvernorats,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Mandat $mandat
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Mandat $mandat)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $clients = $em->getRepository('TiersBundle:Client')->findAll();
        $typesTaches = $this->getDoctrine()->getManager()->getRepository('BienBundle:TypeTache')->findAll();

        return $this->render('@Bien/Mandat/show.html.twig', array(
            'mandat' => $mandat,
            'typesTaches' => $typesTaches,
            'clients' => $clients
        ));
    }

    /**
     * @param Request $request
     * @param Mandat $mandat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, $id)


    {

        $em = $this->getDoctrine()->getEntityManager();
        $mandat = $em->getRepository('SBC\BienBundle\Entity\Mandat')->find($id);
//        die(var_dump($mandat->getAcquisition()->getBien()));
//        $mandat = new Mandat();
        $editForm = $this->createForm(MandatType::class, $mandat);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mandat_index');
        }
        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
        return $this->render('BienBundle:Mandat:edit.html.twig', array(
            'mandat' => $mandat,
            'gouvernorats' => $gouvernorats,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Mandat $mandat
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Mandat $mandat)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($mandat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $mandats = $this->getDoctrine()->getManager()->getRepository('BienBundle:Mandat')->findAll();

        $liste = array();
        foreach ($mandats as $mandat) {
            $liste[] = array(
                'title' => $mandat->getNumero(),
                'id' => $mandat->getId(),
            );
        }

        return new JsonResponse($liste);
    }


    /**
     * @param Request $request
     * @param Mandat $mandat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newChildAction(Request $request, Mandat $mandat)
    {
        $mandatChild = clone $mandat;
        $mandatChild->setMandatParent($mandat);

        $editForm = $this->createForm(MandatType::class, $mandatChild);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mandatChild);
            $em->flush();

            return $this->redirectToRoute('mandat_show', array('id' => $mandatChild->getId()));
        }

        return $this->render('BienBundle:Mandat:edit.html.twig', array(
            'mandat' => $mandatChild,
            'form' => $editForm->createView()
        ));
    }

}