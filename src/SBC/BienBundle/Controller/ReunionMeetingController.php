<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\ReunionMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReunionMeetingController
 * @package SBC\BienBundle\Controller
 */
class ReunionMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $reunionMeeting = new ReunionMeeting();
        $em = $this->getDoctrine()->getManager();

        $reunionMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $reunionMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $reunionMeeting->setColor($request->request->get('color'));
        $reunionMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $reunionMeeting->setTitle($request->request->get('title'));
        $reunionMeeting->setOtherclients($request->request->get('other'));

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $reunionMeeting->addRemindFor($remindFor);

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $reunionMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $reunionMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $reunionMeeting->setStatus($request->request->get('status'));
        $reunionMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $reunionMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($reunionMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}