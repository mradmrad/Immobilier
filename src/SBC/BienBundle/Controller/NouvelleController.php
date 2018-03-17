<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Form\NouvelleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NouvelleController
 * @package SBC\BienBundle\Controller
 */
class NouvelleController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nouvelles = $em->getRepository('BienBundle:Bien')
            ->getAll(Bien::NOUVELLE_CONFIRMEE, Bien::NOUVELLE_NON_CONFIRMEE, $request->request->get('rueID'));

        if ($request->request->get('rueID') == null) {
            $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
            return $this->render('@Bien/Nouvelle/index.html.twig', array('nouvelles' => $nouvelles
            ,'gouvernorats'=>$gouvernorats));
        } else {

            return new JsonResponse(json_decode(json_encode($nouvelles)));
        }
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $nouvelles = $this->getDoctrine()->getManager()->getRepository('BienBundle:Bien')
            ->findAll(Bien::NOUVELLE_CONFIRMEE, Bien::NOUVELLE_NON_CONFIRMEE);

        $liste = array();
        foreach ($nouvelles as $nouvelle) {
            $liste[] = array(
                'title' => $nouvelle->getTitle(),
                'id' => $nouvelle->getId(),
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

        $nouvelle = new Bien();
        $nouvelle->setCreatedBy($this->getUser()->getPersonnel());

        $form = $this->createForm(NouvelleType::class, $nouvelle);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($nouvelle);
            $em->flush();
            return $this->redirectToRoute('nouvelle_index');
        }

        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();
        return $this->render('@Bien/Nouvelle/new.html.twig', array(
            'nouvelle' => $nouvelle,
            'gouvernorats' => $gouvernorats,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction($id)
    {
        if ($id === '') {
            throw $this->createNotFoundException("Vous avez passé des données eronnées.");
        }

        $em = $this->getDoctrine()->getManager();
        $nouvelle = $em->getRepository('BienBundle:Bien')->find($id);

        if ($nouvelle === null) {
            throw $this->createNotFoundException("La nouvelle d'id " . $nouvelle->getId() . " n'existe pas.");
        }

        $typesTaches = $em->getRepository('BienBundle:TypeTache')->findAll();

        return $this->render('@Bien/Nouvelle/show.html.twig', array(
            'nouvelle' => $nouvelle,
            'typesTaches' => $typesTaches,
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request, $id)
    {
        if ($id === '') {
            throw $this->createNotFoundException("Vous avez passé des données eronnées.");
        }

        $em = $this->getDoctrine()->getManager();
        $nouvelle = $em->getRepository('BienBundle:Bien')->find($id);

        if ($request->query->has('transfert')) {
            $nouvelle->setTransfert(1);
        }

        if (null === $nouvelle) {
            throw new NotFoundHttpException("La nouvelle d'id " . $nouvelle->getId() . " n'existe pas.");
        }

        $editForm = $this->createForm(NouvelleType::class, $nouvelle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            foreach ($editForm->get('pictures')->getData() as $picture) {
                if ($picture->getDescription() == null) {
                    $nouvelle->removePicture($picture);
                    $em->remove($picture);
                } else {
                    $nouvelle->addPicture($picture);
                }
            }

            $em->persist($nouvelle);
            $em->flush();
            return $this->redirectToRoute('nouvelle_index');
        }

        $gouvernorats = $em->getRepository('GeoTunisieBundle:Gouvernorat')->findAll();

        return $this->render('@Bien/Nouvelle/edit.html.twig', array(
            'nouvelle' => $nouvelle,
            'gouvernorats' => $gouvernorats,
            'form' => $editForm->createView(),

        ));
    }

    /**
     * @param Bien $nouvelle
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Bien $nouvelle)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($nouvelle);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

}
