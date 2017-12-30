<?php

namespace SBC\GeoTunisieBundle\Controller;

use SBC\GeoTunisieBundle\Entity\Localite;
use SBC\GeoTunisieBundle\Form\LocaliteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Localite controller.
 *
 */
class LocaliteController extends Controller
{
    /**
     * Lists all localite entities.
     *
     */
    public function indexAction()
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();

        $localites = $em->getRepository('GeoTunisieBundle:Localite')->findBy(array(),array(
            'ville' =>'DESC'
        ));

        return $this->render('@GeoTunisie/Localite/index.html.twig', array(
            'localites' => $localites,
        ));
    }

    /**
     * Creates a new localite entity.
     *
     */
    public function newAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $localite = new Localite();
        $em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository("GeoTunisieBundle:Ville")->findOneBy(array('id' => $request->request->get('ville')));

        $localite->setVille($ville);
        $localite->setName($request->request->get('localite'));

        $success = true;
        $message = '';

        try {
            $em->persist($localite);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message, 'id' => $localite->getId(), 'localiteName' => $localite->getName()));
    }

    /**
     * Finds and displays a localite entity.
     *
     */
    public function showAction(Localite $localite)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $deleteForm = $this->createDeleteForm($localite);

        return $this->render('@GeoTunisie/Localite/show.html.twig', array(
            'localite' => $localite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localite entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $localite = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Localite')
            ->findOneBy(array('id' => $id));


        $localite->setName($request->request->get('newname'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($localite);
        $em->flush();

        $success = true;

        if ($localite === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * Deletes a lcalite entity.
     *
     */
    public function deleteAction(Localite $localite)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') ) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($localite);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * Creates a form to delete a localite entity.
     *
     * @param Localite $localite The localite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localite $localite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('localite_delete', array('id' => $localite->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function byVilleAction(Request $request)
    {
        $reg = $request->request->get('q'); //---get the reg of search (GET)
        $manager = $this->getDoctrine()->getManager();
        $ville = $manager->getRepository('GeoTunisieBundle:Ville')->find($reg);
        $searchRes = $manager->getRepository('GeoTunisieBundle:Localite')->findBy(array('ville' => $ville));

        $res = array();
        foreach ($searchRes as $localite) {
            $res[] = array(
                'value' => $localite->getId(),
                'text' => $localite->getName(),
            );
        }

        return new JsonResponse($res);
    }


    public function byNameAction($name)
    {
        $localite = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Localite')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($localite === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listForAjaxAction()
    {

        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Localite')->findAll();

        $res = array();
        foreach ($searchRes as $localite) {
            $res[] = array(
                'value' => $localite->getId(),
                'text' => $localite->getName(),
            );
        }

        return new JsonResponse($res);
    }

    public function newLocaliteAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $localite = new Localite();
        $form = $this->createForm(LocaliteType::class, $localite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($localite);
            $em->flush();

            return $this->redirectToRoute('localite_index');
        }

        return $this->render('@GeoTunisie/Localite/new.html.twig', array(
//            'gouvernorat' => $ville,
            'form' => $form->createView(),
        ));
    }
}
