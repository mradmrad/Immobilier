<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\AcquisitionMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AcquisitionMeetingController
 * @package SBC\BienBundle\Controller
 */
class AcquisitionMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $acquisitionMeeting = new AcquisitionMeeting();
        $em = $this->getDoctrine()->getManager();

        $acquisitionMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $acquisitionMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $acquisitionMeeting->setColor($request->request->get('color'));
        $acquisitionMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $acquisitionMeeting->setTitle($request->request->get('title'));
        $acquisitionMeeting->setOtherclients($request->request->get('other'));

        $acquisition = $em->getRepository('BienBundle:Acquisition')->find($request->request->get('acquisition'));
        $acquisitionMeeting->setAcquisition($acquisition);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $acquisitionMeeting->addRemindFor($remindFor);


        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $acquisitionMeeting->setClient($client);

        if($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore){
                $acquisitionMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }

        }

        $acquisitionMeeting->setStatus($request->request->get('status'));
        $acquisitionMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $acquisitionMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $acquisitionMeeting->getAcquisition()->setUpdatedAt();
            $em->persist($acquisitionMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}