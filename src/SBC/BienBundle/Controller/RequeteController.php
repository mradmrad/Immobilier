<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Requete;
use SBC\BienBundle\Form\RequeteType;
use SBC\TiersBundle\Entity\Client;
use SBC\TiersBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class RequeteController
 * @package SBC\BienBundle\Controller
 */
class RequeteController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction()
    {
        $requetes = $this->getDoctrine()->getManager()->getRepository('BienBundle:Requete')->findAll();

        return $this->render('@Bien/Requete/index.html.twig', array(
            'requetes' => $requetes,
        ));
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $requetes = $this->getDoctrine()->getManager()->getRepository('BienBundle:Requete')->findAll();

        $liste = array();
        foreach ($requetes as $requete) {
            $liste[] = array(
                'title' => $requete->getReference(),
                'id' => $requete->getId(),
            );
        }

        return new JsonResponse($liste);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requete = new Requete();
        $client = new Client();
        $code = $em->getRepository('BienBundle:Requete')->generateReference();
        $requete->setReference('REQ'.(sprintf("%04d",intval($code[0][1])+1)));
        $requete->setPersonnel($this->getUser()->getPersonnel());
        $form = $this->createForm(RequeteType::class, $requete);
        $clientform = $this->createForm(ClientType::class,$client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($requete);
            $em->flush();

            return $this->redirectToRoute('requete_show', array('id' => $requete->getId()));
        }
        return $this->render('@Bien/Requete/new.html.twig', array(
            'requete' => $requete,
            'form' => $form->createView(),
            'clientform' => $clientform->createView()
        ));
    }

    /**
     * @param Requete $requete
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Requete $requete)
    {
        $typesTaches = $this->getDoctrine()->getManager()->getRepository('BienBundle:TypeTache')->findAll();
        return $this->render('@Bien/Requete/show.html.twig', array(
            'requete' => $requete,
            'typesTaches' => $typesTaches,
        ));
    }

    /**
     * @param Request $request
     * @param Requete $requete
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, Requete $requete)
    {
        $editForm = $this->createForm(RequeteType::class, $requete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($requete);
            $em->flush();

            return $this->redirectToRoute('requete_show', array('id' => $requete->getId()));
        }

        return $this->render('@Bien/Requete/edit.html.twig', array(
            'requete' => $requete,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * @param Requete $requete
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Requete $requete)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($requete);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    public function stateAction($id, $state)
    {
        $em = $this->getDoctrine()->getManager();
        $requete = $em->getRepository('SBC\BienBundle\Entity\Requete')->find($id);
        $requete->setEtatRequete($state);
        $em->persist($requete);
        $em->flush();
        return $this->redirectToRoute('requete_index');
    }

    /**
     * @param $reference
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getRequeteByReferenceAction($reference)
    {
        $requete = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Requete')
            ->findOneBy(array('reference' => $reference));

        $success = true;

        if ($requete === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }
}
