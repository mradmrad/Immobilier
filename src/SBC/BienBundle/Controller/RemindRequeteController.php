<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RemindRequete;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemindRequeteController
 * @package SBC\BienBundle\Controller
 */
class RemindRequeteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $remindRequete = new RemindRequete();
        $em = $this->getDoctrine()->getManager();

        $remindRequete->setCreatedBy($this->getUser()->getPersonnel());
        $remindRequete->setBeginDate(new \DateTime($request->request->get('start')));
        $remindRequete->setColor($request->request->get('color'));
        $remindRequete->setFinishDate(new \DateTime($request->request->get('end')));
        $remindRequete->setTitle($request->request->get('title'));

        $requete = $em->getRepository('BienBundle:Requete')->find($request->request->get('requete'));
        $remindRequete->setRequete($requete);

        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $remindRequete->setRemindFor($remindFor);

        $success = true;
        $message = '';

        try {
            $remindRequete->getRequete()->setUpdatedAt();
            $em->persist($remindRequete);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
}