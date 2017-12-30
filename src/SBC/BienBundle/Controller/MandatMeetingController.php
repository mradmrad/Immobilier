<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\MandatMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class MandatMeetingController
 * @package SBC\BienBundle\Controller
 */
class MandatMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $mandatMeeting = new MandatMeeting();

        $mandatMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $mandatMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $mandatMeeting->setColor($request->request->get('color'));
        $mandatMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $mandatMeeting->setTitle($request->request->get('title'));
        $mandatMeeting->setOtherclients($request->request->get('other'));

        $em = $this->getDoctrine()->getManager();

        $mandat = $em->getRepository('BienBundle:Mandat')
            ->find($request->request->get('mandat'));
        $mandatMeeting->setMandat($mandat);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')
            ->find($request->request->get('remindFor'));
        $mandatMeeting->addRemindFor($remindFor);

        $client = $em->getRepository('TiersBundle:Client')
            ->find($request->request->get('client'));
        $mandatMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $mandatMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $mandatMeeting->setStatus($request->request->get('status'));
        $mandatMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $mandatMeeting->setTypeMandaMeeting($request->request->get('typeMandatMeeting'));
        $mandatMeeting->setProposedPrice((float) str_replace(',', '.',
            str_replace(" ", "", $request->request->get('proposedPrice'))));
        $mandatMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $mandatMeeting->getMandat()->setUpdatedAt();

            $em->persist($mandatMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}