<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\OtherMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OtherMeetingController
 * @package SBC\BienBundle\Controller
 */
class OtherMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $otherMeeting = new OtherMeeting();
        $em = $this->getDoctrine()->getManager();

        $otherMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $otherMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $otherMeeting->setColor($request->request->get('color'));
        $otherMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $otherMeeting->setTitle($request->request->get('title'));
        $otherMeeting->setOtherclients($request->request->get('other'));

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $otherMeeting->addRemindFor($remindFor);

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $otherMeeting->setClient($client);

        if($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore){
                $otherMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $otherMeeting->setStatus($request->request->get('status'));
        $otherMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $otherMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($otherMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}