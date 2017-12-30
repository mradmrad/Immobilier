<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TypeTache;
use SBC\BienBundle\Form\TypeTacheType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TypeTacheController
 * @package SBC\BienBundle\Controller
 */
class TypeTacheController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $typeTaches = $this->getDoctrine()->getManager()->getRepository('BienBundle:TypeTache')->findAll();

        return $this->render('@Bien/TypeTache/index.html.twig', array(
            'typeTaches' => $typeTaches,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $typeTache = new TypeTache();
        $form = $this->createForm(TypeTacheType::class, $typeTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeTache);
            $em->flush();
            return $this->redirectToRoute('typetache_show', array('id' => $typeTache->getId()));
        }

        return $this->render('@Bien/TypeTache/new.html.twig', array(
            'typeTache' => $typeTache,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param TypeTache $typeTache
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(TypeTache $typeTache)
    {
        return $this->render('@Bien/TypeTache/show.html.twig', array(
            'typeTache' => $typeTache,
        ));
    }

    /**
     * @param Request $request
     * @param TypeTache $typeTache
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, TypeTache $typeTache)
    {
        $editForm = $this->createForm(TypeTacheType::class, $typeTache);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('typetache_show', array('id' => $typeTache->getId()));
        }

        return $this->render('@Bien/TypeTache/edit.html.twig', array(
            'typeTache' => $typeTache,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * @param TypeTache $typeTache
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(TypeTache $typeTache)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($typeTache);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $title
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getTypeTacheByTitleAction($title)
    {
        $typeTache = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:TypeTache')
            ->findOneBy(array('title' => $title));

        $success = true;

        if ($typeTache === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }
}