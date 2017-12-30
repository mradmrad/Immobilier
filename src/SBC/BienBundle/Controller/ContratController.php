<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Contrat;
use SBC\BienBundle\Form\ContratType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContratController
 * @package SBC\BienBundle\Controller
 */
class ContratController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction()
    {
        $contrats = $this->getDoctrine()->getManager()->getRepository('BienBundle:Contrat')->findAll();

        return $this->render('@Bien/Contrat/index.html.twig', array(
            'contrats' => $contrats,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $contrat = new Contrat();
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            try {
                $em->getRepository('BienBundle:Contrat')->invalidateContratsOfBien($form->get('bien')->getData());
                $em->persist($contrat);
                $em->flush();
                return $this->redirectToRoute('contrat_show', array('id' => $contrat->getId()));
            } catch (\Exception $e) {
                var_dump($e);
            }

        }

        return $this->render('@Bien/Contrat/new.html.twig', array(
            'contrat' => $contrat,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Contrat $contrat
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Contrat $contrat)
    {
        return $this->render('@Bien/Contrat/show.html.twig', array(
            'contrat' => $contrat
        ));
    }

    /**
     * @param Request $request
     * @param Contrat $contrat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, Contrat $contrat)
    {
        $editForm = $this->createForm(ContratType::class, $contrat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('contrat_show', array('id' => $contrat->getId()));
        }

        return $this->render('@Bien/Contrat/edit.html.twig', array(
            'contrat' => $contrat,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Contrat $contrat
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Contrat $contrat)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($contrat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $reference
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getContratByReferenceAction($reference)
    {
        $contrat = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Contrat')
            ->findOneBy(array('reference' => $reference));

        $success = true;

        if ($contrat === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }
}
