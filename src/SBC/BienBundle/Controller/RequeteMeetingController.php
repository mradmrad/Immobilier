<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RequeteMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequeteMeetingController
 * @package SBC\BienBundle\Controller
 */
class RequeteMeetingController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $requeteMeeting = new RequeteMeeting();
        $em = $this->getDoctrine()->getManager();

        $requeteMeeting->setCreatedBy($this->getUser()->getPersonnel());
        $requeteMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $requeteMeeting->setColor($request->request->get('color'));
        $requeteMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $requeteMeeting->setTitle($request->request->get('title'));
        $requeteMeeting->setOtherclients($request->request->get('other'));

        $requete = $em->getRepository('BienBundle:Requete')->find($request->request->get('requete'));
        $requeteMeeting->setRequete($requete);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $requeteMeeting->addRemindFor($remindFor);

        $client = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $requeteMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $requeteMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $requeteMeeting->setStatus($request->request->get('status'));
        $requeteMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $requeteMeeting->setDescription($request->request->get('description'));
        $success = true;
        $message = '';

        try {
            $requeteMeeting->getRequete()->setUpdatedAt();
            $em->persist($requeteMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}
