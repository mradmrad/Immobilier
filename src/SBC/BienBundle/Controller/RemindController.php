<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Remind;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemindController
 * @package SBC\BienBundle\Controller
 */
class RemindController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction()
    {
        return $this->render('@Bien/Remind/index.html.twig');
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {

//        if ($this->isGranted('ROLE_SUPER_ADMIN'))
//            $reminds = $this->getDoctrine()->getManager()->getRepository('BienBundle:Remind')->findAll();
//        else
        $reminds = $this->getDoctrine()->getManager()->getRepository('BienBundle:Remind')->findBy(array('remindFor' => $this->getUser()->getPersonnel()->getId()));

        $events = array();
        foreach ($reminds as $remind) {
            $events[] = array(
                'id' => $remind->getId(),
                'title' => $remind->getTitle(),
                'start' => $remind->getBeginDate()->format('Y-m-d H:i'),
                'end' => $remind->getFinishDate()->format('Y-m-d H:i'),
                'color' => $remind->getColor(),
                'resourceId' => $remind->getRemindFor()->getId(),
                'remindFor' => $remind->getRemindFor()->getName(),
                'createdBy' => $remind->getCreatedBy()->getName(),
                'isNotified' => $remind->getIsNotified()
            );
        }

        return new JsonResponse($events);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $remind = new Remind();
        $em = $this->getDoctrine()->getManager();

        if ($request->request->get('personnel') != '')
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('personnel'));
        else
            $remindFor = $this->getUser()->getPersonnel();

        $remind->setCreatedBy($this->getUser()->getPersonnel());
        $remind->setBeginDate(new \DateTime($request->request->get('start')));
        $remind->setColor($request->request->get('color'));
        $remind->setFinishDate(new \DateTime($request->request->get('end')));
        $remind->setTitle($request->request->get('title'));
        $remind->setIsNotified(false);
        $remind->setRemindFor($remindFor);

        $success = true;
        $message = '';

        try {
            $em->persist($remind);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $remind = $em->getRepository('BienBundle:Remind')->find($request->request->get('id'));
        $remind->setBeginDate(new \DateTime($request->request->get('start')));
        $remind->setFinishDate(new \DateTime($request->request->get('end')));
        $remind->setTitle($request->request->get('title'));
        if ($request->request->get('remindFor') !== null) {
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $remind->setRemindFor($remindFor);
        }


        $success = true;
        $message = '';

        try {
            $em->persist($remind);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message,
            'remindFor' => $remind->getRemindFor()->getName()
        ));
    }
}
