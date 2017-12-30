<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\Acquisition;
use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Form\AcquisitionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class AcquisitionController
 * @package SBC\BienBundle\Controller
 */
class AcquisitionController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR')or has_role('ROLE_SUPERVISEUR')or has_role('ROLE_WEB_MARKETING')")
     */

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $acquisitions = $em->getRepository('BienBundle:Acquisition')->findAll($request->request->get('rueID'));

        if ($request->request->get('rueID') == null) {
            $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
            return $this->render('@Bien/Acquisition/index.html.twig', array('acquisitions' => $acquisitions,'gouvernorats'=>$gouvernorats));
        } else {

            return new JsonResponse(json_decode(json_encode($acquisitions)));
        }
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $acquisitions = $this->getDoctrine()->getManager()->getRepository('BienBundle:Acquisition')->findAll();

        $list = array();
        foreach ($acquisitions as $acquisition) {
            $list[] = array(
                'title' => $acquisition->getBien()->getTitle(),
                'id' => $acquisition->getId(),
            );
        }

        return new JsonResponse($list);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function transfertAction(Request $request, $id = null)
    {
        $acquisition = new Acquisition();
        if ($id != '') {
            $bien = $this->getDoctrine()->getRepository('BienBundle:Bien')->find($id);
            $acquisition->setBien($bien);
        }

        $form = $this->createForm(AcquisitionType::class, $acquisition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $acquisition->getBien()->setType(Bien::ACQUISITION);
            $em->persist($acquisition);
            $em->flush();

            return $this->redirectToRoute('acquisition_show', array('id' => $acquisition->getId()));
        }

        return $this->render('@Bien/Acquisition/transfert.html.twig', array(
            'acquisition' => $acquisition,
            'form' => $form->createView(),
        ));
    }


    /**
     * @param Request $request
     * @param null $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $acquisition = new Acquisition();

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(AcquisitionType::class, $acquisition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acquisition->getBien()->setCreatedBy($this->getUser()->getPersonnel());
            $acquisition->getBien()->setType(Bien::ACQUISITION);
            $em = $this->getDoctrine()->getManager();
            $em->persist($acquisition);
            $em->flush();

            return $this->redirectToRoute('acquisition_show', array('id' => $acquisition->getId()));
        }
        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
        return $this->render('@Bien/Acquisition/new.html.twig', array(
            'acquisition' => $acquisition,
            'gouvernorats' => $gouvernorats,
            'form' => $form->createView(),
        ));
    }


    /**
     * @param Acquisition $acquisition
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Acquisition $acquisition)
    {
        $em = $this->getDoctrine()->getManager();
        $typesTaches = $em->getRepository('BienBundle:TypeTache')->findAll();

        return $this->render('@Bien/Acquisition/show.html.twig', array(
            'acquisition' => $acquisition,
            'typesTaches' => $typesTaches,

        ));
    }

    /**
     * @param Request $request
     * @param Acquisition $acquisition
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, Acquisition $acquisition)
    {
        $editForm = $this->createForm(AcquisitionType::class, $acquisition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($acquisition);
            $em->flush();
            return $this->redirectToRoute('acquisition_show', array('id' => $acquisition->getId()));
        }

        return $this->render('@Bien/Acquisition/edit.html.twig', array(
            'acquisition' => $acquisition,
            'form' => $editForm->createView(),
        ));
    }


    /**
     * @param Acquisition $acquisition
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Acquisition $acquisition)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($acquisition);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }
}
