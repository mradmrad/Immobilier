<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Commodite;
use SBC\BienBundle\Form\CommoditeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CommoditeController
 * @package SBC\BienBundle\Controller
 */
class CommoditeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $commodites = $this->getDoctrine()->getManager()->getRepository('BienBundle:Commodite')->findAll();

        return $this->render('@Bien/Commodite/index.html.twig', array(
            'commodites' => $commodites,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $commodite = new Commodite();
        $form = $this->createForm(CommoditeType::class, $commodite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commodite);
            $em->flush();

            return $this->redirectToRoute('commodite_show', array('id' => $commodite->getId()));
        }

        return $this->render('@Bien/Commodite/new.html.twig', array(
            'commodite' => $commodite,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Commodite $commodite
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(Commodite $commodite)
    {
        return $this->render('@Bien/Commodite/show.html.twig', array(
            'commodite' => $commodite,

        ));
    }

    /**
     * @param Request $request
     * @param Commodite $commodite
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Commodite $commodite)
    {
        $editForm = $this->createForm(CommoditeType::class, $commodite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('commodite_edit', array('id' => $commodite->getId()));
        }

        return $this->render('@Bien/Commodite/edit.html.twig', array(
            'commodite' => $commodite,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * @param Commodite $commodite
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Commodite $commodite)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($commodite);
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
    public function getCommoditeByNameAction($name)
    {
        $commodite = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Commodite')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($commodite === null)
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
        $commodite = new Commodite();
        $em = $this->getDoctrine()->getManager();

        $commodite->setName($request->request->get('commodite'));

        $success = true;
        $message = '';

        try {
            $em->persist($commodite);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $commodite->getId(),
            'commoditeName' => $commodite->getName()
        ));
    }
}
