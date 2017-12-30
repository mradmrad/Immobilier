<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RemindNouvelle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemindNouvelleController
 * @package SBC\BienBundle\Controller
 */
class RemindNouvelleController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $remindNouvelle = new RemindNouvelle();
        $em = $this->getDoctrine()->getManager();

        $remindNouvelle->setCreatedBy($this->getUser()->getPersonnel());
        $remindNouvelle->setBeginDate(new \DateTime($request->request->get('start')));
        $remindNouvelle->setColor($request->request->get('color'));
        $remindNouvelle->setFinishDate(new \DateTime($request->request->get('end')));
        $remindNouvelle->setTitle($request->request->get('title'));

        $nouvelle = $em->getRepository('BienBundle:Bien')->find($request->request->get('nouvelle'));
        $remindNouvelle->setNouvelle($nouvelle);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $remindNouvelle->setRemindFor($remindFor);

        $success = true;
        $message = '';

        try {
            $remindNouvelle->getNouvelle()->setUpdatedAt();
            $em->persist($remindNouvelle);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}