<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TypeBien;
use SBC\BienBundle\Form\TypeBienType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TypeBienController
 * @package SBC\BienBundle\Controller
 */
class TypeBienController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $typeBiens = $this->getDoctrine()->getManager()->getRepository('BienBundle:TypeBien')->findAll();

        return $this->render('@Bien/TypeBien/index.html.twig', array(
            'typeBiens' => $typeBiens,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $typeBien = new Typebien();
        $form = $this->createForm(TypeBienType::class, $typeBien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeBien);
            $em->flush();

            return $this->redirectToRoute('typebien_show', array('id' => $typeBien->getId()));
        }

        return $this->render('@Bien/TypeBien/new.html.twig', array(
            'typeBien' => $typeBien,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param TypeBien $typeBien
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(TypeBien $typeBien)
    {
        return $this->render('@Bien/TypeBien/show.html.twig', array(
            'typeBien' => $typeBien,

        ));
    }

    /**
     * @param Request $request
     * @param TypeBien $typeBien
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, TypeBien $typeBien)
    {
        $editForm = $this->createForm(TypeBienType::class, $typeBien);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('typebien_edit', array('id' => $typeBien->getId()));
        }

        return $this->render('@Bien/TypeBien/edit.html.twig', array(
            'typeBien' => $typeBien,
            'form' => $editForm->createView(),

        ));
    }

    /**
     * @param TypeBien $typeBien
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(TypeBien $typeBien)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($typeBien);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $name
     * @param $category
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getTypeBienByNameAndCategoryAction($name, $category)
    {
        $typeBien = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:TypeBien')
            ->findOneBy(array('name' => $name, 'category' => $category));

        $success = true;

        if ($typeBien === null)
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
        $typeBien = new TypeBien();
        $em = $this->getDoctrine()->getManager();

        $typeBien->setName($request->request->get('typeBien'));
        $category = $em->getRepository('BienBundle:Category')->find($request->request->get('category'));
        $typeBien->setCategory($category);

        if ($request->request->get('equipped') == 'true') {
            $typeBien->setEquipped(1);
        } else {
            $typeBien->setEquipped(0);
        }

        if ($request->request->get('furnished') == 'true') {
            $typeBien->setFurnished(1);
        } else {
            $typeBien->setFurnished(0);
        }

        if ($request->request->get('bathroom') == 'true') {
            $typeBien->setBathroom(1);
        } else {
            $typeBien->setBathroom(0);
        }

        if ($request->request->get('bedroom') == 'true') {
            $typeBien->setBedroom(1);
        } else {
            $typeBien->setBedroom(0);
        }

        $success = true;
        $message = '';

        try {
            $em->persist($typeBien);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message,
            'id' => $typeBien->getId(),
            'typeBienName' => $typeBien->getName()
        ));
    }
}