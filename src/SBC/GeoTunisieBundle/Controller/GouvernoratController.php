<?php

namespace SBC\GeoTunisieBundle\Controller;

use SBC\GeoTunisieBundle\Entity\Gouvernorat;
use SBC\GeoTunisieBundle\Form\GouvernoratType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

/**
 * Gouvernorat controller.
 *
 */
class GouvernoratController extends Controller
{
    /**
     * Lists all gouvernorat entities.
     *
     */
    public function indexAction()
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }


        $gouvernorats = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();

        return $this->render('@GeoTunisie/Gouvernorat/index.html.twig', array(
            'gouvernorats' => $gouvernorats,
        ));
    }

    /**
     * Creates a new gouvernorat entity.
     *
     */
    public function newAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $gouvernorat = new Gouvernorat();
        $form = $this->createForm(GouvernoratType::class, $gouvernorat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gouvernorat);
            $em->flush();

            return $this->redirectToRoute('gouvernorat_show', array('id' => $gouvernorat->getId()));
        }

        return $this->render('@GeoTunisie/Gouvernorat/new.html.twig', array(
            'gouvernorat' => $gouvernorat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gouvernorat entity.
     *
     */
    public function showAction(Gouvernorat $gouvernorat)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }


        return $this->render('@GeoTunisie/Gouvernorat/show.html.twig', array(
            'gouvernorat' => $gouvernorat
        ));
    }

    /**
     * Displays a form to edit an existing gouvernorat entity.
     *
     */
    public function editAction(Request $request, Gouvernorat $gouvernorat)
    {
        $gouvernorat->setName($request->request->get('newname'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($gouvernorat);
        $em->flush();

        $success = true;

        if ($gouvernorat === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * Deletes a gouvernorat entity.
     *
     */
    public function deleteAction(Gouvernorat $gouvernorat)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($gouvernorat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }



    public function byNameAction($name)
    {
        $gouvernorat = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Gouvernorat')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($gouvernorat === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listForAjaxAction()
    {

        $searchRes = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Gouvernorat')
            ->findAll();

        $res = array();
        foreach ($searchRes as $gouvernorat) {
            $res[] = array(
                'value' => $gouvernorat->getId(),
                'text' => $gouvernorat->getName(),
            );
        }

        return new JsonResponse($res);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function mapAction($id)
    {



        $gouvernorats = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Gouvernorat')
            ->myfindAll($id);
//        $gouvernorats = $this->getDoctrine()
//            ->getManager()
//            ->getRepository('GeoTunisieBundle:Gouvernorat')
//            ->findBy(array(),
//                array(
//                    'position' => 'ASC'
//                ));
//        die(var_dump($gouvernorats));

        $g = json_encode($gouvernorats);
        $g = str_replace('villes', 'children', $g);
        $g = str_replace('localites', 'children', $g);
        $g = str_replace('rues', 'children', $g);
        $g = str_replace('"id"', '"key"', $g);
        $g = str_replace('"name"', '"title"', $g);

        return new JsonResponse(json_decode($g));
    }

}
