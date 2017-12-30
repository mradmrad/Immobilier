<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Origine;
use SBC\BienBundle\Form\OrigineType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrigineController
 * @package SBC\BienBundle\Controller
 */
class OrigineController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $origines = $this->getDoctrine()->getManager()->getRepository('BienBundle:Origine')->findAll();

        return $this->render('@Bien/Origine/index.html.twig', array(
            'origines' => $origines,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $origine = new Origine();
        $form = $this->createForm(OrigineType::class, $origine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($origine);
            $em->flush();

            return $this->redirectToRoute('origine_show', array('id' => $origine->getId()));
        }

        return $this->render('@Bien/Origine/new.html.twig', array(
            'Oorigine' => $origine,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Origine $origine
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(Origine $origine)
    {
       return $this->render('@Bien/Origine/show.html.twig', array(
            'origine' => $origine,

        ));
    }

    /**
     * @param Request $request
     * @param Origine $origine
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Origine $origine)
    {
        $editForm = $this->createForm(OrigineType::class, $origine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('origine_edit', array('id' => $origine->getId()));
        }

        return $this->render('@Bien/Origine/edit.html.twig', array(
            'origine' => $origine,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * @param Origine $origine
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Origine $origine)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($origine);
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
     */
    public function getOrigineByNameAction($name)
    {
        $origine = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Origine')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($origine === null)
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
        $origine = new Origine();
        $em = $this->getDoctrine()->getManager();

        $origine->setName($request->request->get('origine'));

        $success = true;
        $message = '';

        try {
            $em->persist($origine);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $origine->getId(),
            'origineName' => $origine->getName()
        ));
    }
}