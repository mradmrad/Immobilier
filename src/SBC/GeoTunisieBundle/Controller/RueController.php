<?php

namespace SBC\GeoTunisieBundle\Controller;

use SBC\GeoTunisieBundle\Entity\Rue;
use SBC\GeoTunisieBundle\Form\RueType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Rue controller.
 *
 */
class RueController extends Controller
{
    /**
     * Lists all rue entities.
     *
     */
    public function indexAction()
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();

        $rues = $em->getRepository('GeoTunisieBundle:Rue')->findAll();

        return $this->render('GeoTunisieBundle:Rue:index.html.twig', array(
            'rues' => $rues,
        ));
    }

    public function newAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $rue = new Rue();
        $em = $this->getDoctrine()->getManager();
        $localite = $em->getRepository("GeoTunisieBundle:Localite")->findOneBy(array('id' =>$request->request->get('localite')) );

        $rue->setLocalite($localite);
        $rue->setName($request->request->get('rue'));

        $success = true;
        $message= '';

        try {
            $em->persist($rue);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message, 'id'=>$rue->getId(), 'rueName'=> $rue->getName()));
    }

    public function formAction(Request $request)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $rue = new Rue();
        $form = $this->createForm(RueType::class, $rue);
        $form->handleRequest($request);
        $success = true;

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($rue);
                $em->flush();
            } catch (\Exception $e) {
                $success = false;
            }
            return new JsonResponse(array('success' => $success));
        }

        return $this->render('GeoTunisieBundle:Rue:form.html.twig', array(
            'rue' => $rue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rue entity.
     *
     */
    public function showAction(Rue $rue)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $deleteForm = $this->createDeleteForm($rue);

        return $this->render('GeoTunisieBundle:Rue:show.html.twig', array(
            'rue' => $rue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rue entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $rue = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Gouvernorat')
            ->findOneBy(array('id' => $id));


        $rue->setName($request->request->get('newname'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($rue);
        $em->flush();

        $success = true;

        if ($rue === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * Deletes a rue entity.
     *
     */
    public function deleteAction(Rue $rue)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN') ) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($rue);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * Creates a form to delete a rue entity.
     *
     * @param Rue $rue The rue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rue $rue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rue_delete', array('id' => $rue->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listeRuesByRegAction(Request $request)
    {
        $reg = $request->query->get('q'); //---get the reg of search (GET)
        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Rue')->listeRuesByReg($reg);

        $res = array();
        foreach ($searchRes as $rue) {
            $res[] = array(
                'id' => $rue->getId(),
                'text' => $rue->getName(),
            );
        }

        return new JsonResponse($res);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function byLocaliteAction(Request $request)
    {
        $reg = $request->request->get('q'); //---get the reg of search (GET)
        $manager = $this->getDoctrine()->getManager();
        $localite = $manager->getRepository('GeoTunisieBundle:Localite')->find($reg);
        $searchRes = $manager->getRepository('GeoTunisieBundle:Rue')->findBy(array('localite' => $localite));

        $res = array();
        foreach ($searchRes as $rue) {
            $res[] = array(
                'value' => $rue->getId(),
                'text' => $rue->getName(),
            );
        }

        return new JsonResponse($res);
    }


    public function byNameAction($name)
    {
        $rue = $this->getDoctrine()
            ->getManager()
            ->getRepository('GeoTunisieBundle:Rue')
            ->findOneBy(array('name' => $name));

        $success = true;

        if ($rue === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listForAjaxAction()
    {

        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Rue')->findAll();

        $res = array();
        foreach ($searchRes as $rue) {
            $res[] = array(
                'value' => $rue->getId(),
                'text' => $rue->getName(),
            );
        }

        return new JsonResponse($res);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listRuesAction()
    {

        $searchRes = $this->getDoctrine()->getManager()->getRepository('GeoTunisieBundle:Rue')->findAll();

        $res = array();
        foreach ($searchRes as $rue) {
            $res[] = array(
                'id' => $rue->getId(),
                'name' => $rue->getName(),
                'idLocalite' => $rue->getLocalite()->getId(),
                'nameLocalite' => $rue->getLocalite()->getName(),
                'idVille' => $rue->getLocalite()->getVille()->getId(),
                'nameVille' => $rue->getLocalite()->getVille()->getName(),
                'idGouvenraurat' => $rue->getLocalite()->getVille()->getGouvernorat()->getId(),
                'nameGouvernaurat' => $rue->getLocalite()->getVille()->getGouvernorat()->getName(),
            );
        }

        return new JsonResponse($res);
    }
    public function newRueAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if (!$this->isGranted('ROLE_SUPER_ADMIN') and !$this->isGranted('ROLE_AGENT') and !$this->isGranted('ROLE_COORDINATEUR') and !$this->isGranted('ROLE_WEB_MARKETING') and !$this->isGranted('ROLE_SUPERVISEUR')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

        $rue = new Rue();
        $form = $this->createForm(RueType::class, $rue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($rue);
            $em->flush();

            return $this->redirectToRoute('rue_index');
        }

        return $this->render('@GeoTunisie/Rue/new.html.twig', array(
//            'gouvernorat' => $ville,
            'form' => $form->createView(),
        ));
    }
}
