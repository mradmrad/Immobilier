<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\BienMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class BienMeetingController
 * @package SBC\BienBundle\Controller
 */
class BienMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $bienMeeting = new BienMeeting();
        $em = $this->getDoctrine()->getManager();

        $bienMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $bienMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $bienMeeting->setColor($request->request->get('color'));
        $bienMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $bienMeeting->setTitle($request->request->get('title'));
        $bienMeeting->setOtherclients($request->request->get('other'));
        $bienMeeting->setZone($request->request->get('zone'));
        $bienMeeting->setRue($request->request->get('rue'));

        if($request->request->get('remindFor') != ''){
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $bienMeeting->addRemindFor($remindFor);
        }

            $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
            $bienMeeting->setClient($client);


        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $bienMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $bienMeeting->setStatus($request->request->get('status'));
        $bienMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $bienMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($bienMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}
