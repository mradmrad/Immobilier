<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Visite;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VisiteController
 * @package SBC\BienBundle\Controller
 */
class VisiteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $visite = new Visite();
        $em = $this->getDoctrine()->getManager();

        $visite->setCreatedBy($this->getUser()->getPersonnel());
        $visite->setBeginDate(new \DateTime($request->request->get('start')));
        $visite->setColor($request->request->get('color'));
        $visite->setFinishDate(new \DateTime($request->request->get('end')));
        $visite->setTitle($request->request->get('title'));
        $visite->setOtherclients($request->request->get('other'));

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $visite->addRemindFor($remindFor);

        $visite->setCreatedBy($this->getUser()->getPersonnel());

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $visite->setClient($client);

        $mandat = $em->getRepository('BienBundle:Mandat')->find($request->request->get('mandat'));
        $visite->setMandat($mandat);


        if($request->request->get('remindFors') != '' or $request->request->get('remindFors') != null) {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore){
                $visite->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }

        }

        $visite->setStatus($request->request->get('status'));
        $visite->setTypeMeeting($request->request->get('typeMeeting'));
        $visite->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($visite);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();

        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message
        ));
    }


}
