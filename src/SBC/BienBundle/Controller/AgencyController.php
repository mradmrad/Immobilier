<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Agency;
use SBC\BienBundle\Form\AgencyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class AgencyController
 * @package SBC\BienBundle\Controller
 */
class AgencyController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $agencies = $em->getRepository('BienBundle:Agency')->findAll();

        return $this->render('@Bien/Agency/index.html.twig', array(
            'agencies' => $agencies,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agency);
            $em->flush();

            return $this->redirectToRoute('agency_show', array('id' => $agency->getId()));
        }

        return $this->render('@Bien/Agency/new.html.twig', array(
            'agency' => $agency,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Agency $agency
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(Agency $agency)
    {
        return $this->render('@Bien/Agency/show.html.twig', array(
            'agency' => $agency
        ));
    }

    /**
     * @param Request $request
     * @param Agency $agency
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Agency $agency)
    {
        $editForm = $this->createForm(AgencyType::class, $agency);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('agency_edit', array('id' => $agency->getId()));
        }

        return $this->render('@Bien/Agency/edit.html.twig', array(
            'agency' => $agency,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Agency $agency
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Agency $agency)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($agency);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $name
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     * or has_role('ROLE_WEB_MARKETING')")
     */
    public function getAgencyByNameAction($name)
    {
        $agency = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Agency')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($agency === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $agency = new Agency();
        $em = $this->getDoctrine()->getManager();

        $agency->setName($request->request->get('agency'));

        $success = true;
        $message = '';

        try {
            $em->persist($agency);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $agency->getId(),
            'agencyName' => $agency->getName()
        ));
    }
}
