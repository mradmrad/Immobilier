<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RemindMandat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemindMandatController
 * @package SBC\BienBundle\Controller
 */
class RemindMandatController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $remindMandat = new RemindMandat();
        $em = $this->getDoctrine()->getManager();

        $remindMandat->setCreatedBy($this->getUser()->getPersonnel());
        $remindMandat->setBeginDate(new \DateTime($request->request->get('start')));
        $remindMandat->setColor($request->request->get('color'));
        $remindMandat->setFinishDate(new \DateTime($request->request->get('end')));
        $remindMandat->setTitle($request->request->get('title'));

        $mandat = $em->getRepository('BienBundle:Mandat')->find($request->request->get('mandat'));
        $remindMandat->setMandat($mandat);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $remindMandat->setRemindFor($remindFor);

        $success = true;
        $message = '';

        try {
            $remindMandat->getMandat()->setUpdatedAt();
            $em->persist($remindMandat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}
