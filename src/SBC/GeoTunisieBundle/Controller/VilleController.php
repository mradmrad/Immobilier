<?php

namespace SBC\GeoTunisieBundle\Controller;

use SBC\GeoTunisieBundle\Entity\Ville;
use SBC\GeoTunisieBundle\Form\VilleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Ville controller.
 *
 */
class VilleController extends Controller
{
    /**
     * Lists all ville entities.
     *
     */
    public function indexAction()
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();

        $villes = $em->getRepository('GeoTunisieBundle:Ville')->findAll();

        return $this->render('@GeoTunisie/Ville/index.html.twig', array(
            'villes' => $villes,
        ));
    }

    /**
     * Creates a new ville entity.
     *
     */
    public function newAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $ville = new Ville();
        $em = $this->getDoctrine()->getManager();
        $gouvernorat = $em->getRepository("GeoTunisieBundle:Gouvernorat")->findOneBy(array('id' => $request->request->get('gouvernorat')));

        $ville->setGouvernorat($gouvernorat);
        $ville->setPostCode($request->request->get('codepostale'));
        $ville->setName($request->request->get('ville'));

        $success = true;
        $message = '';

        try {
            $em->persist($ville);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message, 'id' => $ville->getId(), 'villeName' => $ville->getName()));

    }

    /**
     * Finds and displays a ville entity.
     *
     */
    public function showAction(Ville $ville)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $deleteForm = $this->createDeleteForm($ville);

        return $this->render('@GeoTunisie/Ville/show.html.twig', array(
            'ville' => $ville,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ville entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $ville = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Ville')
            ->findOneBy(array('id' => $id));


        $ville->setName($request->request->get('newname'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($ville);
        $em->flush();

        $success = true;

        if ($ville === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * Deletes a ville entity.
     *
     */
    public function deleteAction(Ville $ville)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($ville);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * Creates a form to delete a ville entity.
     *
     * @param Ville $ville The ville entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ville $ville)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ville_delete', array('id' => $ville->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function byGouvernoratAction(Request $request)
    {
        $reg = $request->request->get('q'); //---get the reg of search (GET)
        $manager = $this->getDoctrine()->getManager();
        $gouvernorat = $manager->getRepository('GeoTunisieBundle:Gouvernorat')->find($reg);
        $searchRes = $manager->getRepository('GeoTunisieBundle:Ville')->findBy(array('gouvernorat' => $gouvernorat));

        $res = array();
        foreach ($searchRes as $ville) {
            $res[] = array(
                'value' => $ville->getId(),
                'text' => $ville->getName(),
            );
        }

        return new JsonResponse($res);
    }


    public function byNameAction($name)
    {
        $ville = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Ville')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($ville === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listForAjaxAction()
    {

        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Ville')->findAll();

        $res = array();
        foreach ($searchRes as $ville) {
            $res[] = array(
                'value' => $ville->getId(),
                'text' => $ville->getName(),
            );
        }

        return new JsonResponse($res);
    }

    public function newVilleAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $ville = new Ville();
        $form = $this->createForm(VilleType::class, $ville);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($ville);
            $em->flush();

//            return $this->redirectToRoute('gouvernorat_show', array('id' => $ville->getId()));
        }

        return $this->render('@GeoTunisie/Ville/new.html.twig', array(
            'gouvernorat' => $ville,
            'form' => $form->createView(),
        ));
    }

}
