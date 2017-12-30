<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RemindAcquisition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemindAcquisitionController
 * @package SBC\BienBundle\Controller
 */
class RemindAcquisitionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
       $RemindAcquisition = new RemindAcquisition();
        $em = $this->getDoctrine()->getManager();

        $RemindAcquisition->setCreatedBy($this->getUser()->getPersonnel());
        $RemindAcquisition->setBeginDate(new \DateTime($request->request->get('start')));
        $RemindAcquisition->setColor($request->request->get('color'));
        $RemindAcquisition->setFinishDate(new \DateTime($request->request->get('end')));
        $RemindAcquisition->setTitle($request->request->get('title'));

        $acquisition = $em->getRepository('BienBundle:Acquisition')->find($request->request->get('acquisition'));
        $RemindAcquisition->setAcquisition($acquisition);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $RemindAcquisition->setRemindFor($remindFor);

        $success = true;
        $message = '';

        try {
            $RemindAcquisition->getAcquisition()->setUpdatedAt();
            $em->persist($RemindAcquisition);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}