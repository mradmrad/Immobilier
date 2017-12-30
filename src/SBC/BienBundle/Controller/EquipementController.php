<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Form\EquipementType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class EquipementController
 * @package SBC\BienBundle\Controller
 */
class EquipementController extends Controller
{
    /**
     * @return Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $equipements = $this->getDoctrine()->getManager()->getRepository('BienBundle:Equipement')->findAll();

        return $this->render('@Bien/Equipement/index.html.twig', array(
            'equipements' => $equipements,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $equipement = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipement);
            $em->flush();

            return $this->redirectToRoute('equipement_show', array('id' => $equipement->getId()));
        }

        return $this->render('@Bien/Equipement/new.html.twig', array(
            'equipement' => $equipement,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Equipement $equipement
     * @return Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(Equipement $equipement)
    {
        return $this->render('@Bien/Equipement/show.html.twig', array(
            'equipement' => $equipement
        ));
    }

    /**
     * @param Request $request
     * @param Equipement $equipement
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Equipement $equipement)
    {
        $editForm = $this->createForm(EquipementType::class, $equipement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('equipement_edit', array('id' => $equipement->getId()));
        }

        return $this->render('@Bien/Equipement/edit.html.twig', array(
            'equipement' => $equipement,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Equipement $equipement
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Equipement $equipement)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($equipement);
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
    public function getEquipementByNameAction($name)
    {
        $equipement = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Equipement')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($equipement === null)
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
        $equipement = new Equipement();
        $em = $this->getDoctrine()->getManager();

        $equipement->setName($request->request->get('equipement'));

        $success = true;
        $message = '';

        try {
            $em->persist($equipement);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $equipement->getId(),
            'equipementName' => $equipement->getName()
        ));
    }
}
