<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TypeContrat;
use SBC\BienBundle\Form\TypeContratType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TypeContratController
 * @package SBC\BienBundle\Controller
 */
class TypeContratController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $typeContrats = $this->getDoctrine()->getManager()->getRepository('BienBundle:TypeContrat')->findAll();

        return $this->render('@Bien/TypeContrat/index.html.twig', array(
            'typeContrats' => $typeContrats,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $typeContrat = new TypeContrat();
        $form = $this->createForm(TypeContratType::class, $typeContrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeContrat);
            $em->flush();
            return $this->redirectToRoute('typecontrat_show', array('id' => $typeContrat->getId()));
        }

        return $this->render('@Bien/TypeContrat/new.html.twig', array(
            'typeContrat' => $typeContrat,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param TypeContrat $typeContrat
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(TypeContrat $typeContrat)
    {
        return $this->render('@Bien/TypeContrat/show.html.twig', array(
            'typeContrat' => $typeContrat
        ));
    }

    /**
     * @param Request $request
     * @param TypeContrat $typeContrat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, TypeContrat $typeContrat)
    {
        $editForm = $this->createForm(TypeContratType::class, $typeContrat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('typecontrat_edit', array('id' => $typeContrat->getId()));
        }

        return $this->render('@Bien/TypeContrat/edit.html.twig', array(
            'typeContrat' => $typeContrat,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param TypeContrat $typeContrat
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(TypeContrat $typeContrat)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($typeContrat);
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
    public function getTypeContratByNameAction($name)
    {
        $typeContrat = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:TypeContrat')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($typeContrat === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }
}
