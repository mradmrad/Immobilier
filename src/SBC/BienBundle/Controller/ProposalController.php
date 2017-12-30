<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Proposal;
use SBC\BienBundle\Form\ProposalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProposalController
 * @package SBC\BienBundle\Controller
 */
class ProposalController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction()
    {
        $proposals = $this->getDoctrine()->getManager()->getRepository('BienBundle:Proposal')->findAll();

        return $this->render('@Bien/Proposal/index.html.twig', array(
            'proposals' => $proposals,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $proposal = new Proposal();
        $proposal->setProposedBy($this->getUser()->getPersonnel());

        $form = $this->createForm(ProposalType::class, $proposal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();

            return $this->redirectToRoute('proposal_show', array('id' => $proposal->getId()));
        }

        return $this->render('@Bien/Proposal/new.html.twig', array(
            'proposal' => $proposal,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Proposal $proposal
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Proposal $proposal)
    {
        return $this->render('@Bien/Proposal/show.html.twig', array(
            'proposal' => $proposal
        ));
    }

    /**
     * @param Request $request
     * @param Proposal $proposal
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, Proposal $proposal)
    {
        $editForm = $this->createForm(ProposalType::class, $proposal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('proposal_show', array('id' => $proposal->getId()));
        }

        return $this->render('@Bien/Proposal/edit.html.twig', array(
            'proposal' => $proposal,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Proposal $proposal
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Proposal $proposal)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($proposal);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));

    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $proposal = new Proposal();
        $proposal->setProposedBy($this->getUser()->getPersonnel());

        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository("TiersBundle:Client")->find($request->request->get('client'));
        $proposal->setProposedFor($client);

        $mandat = $em->getRepository("BienBundle:Mandat")->find($request->request->get('mandat'));
        $proposal->setMandat($mandat);

        $requete = $em->getRepository("BienBundle:Requete")->find($request->request->get('requete'));
        $proposal->setRequete($requete);

        $success = true;
        $message = '';

        try {
            $em->persist($proposal);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }

}
