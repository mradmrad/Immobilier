<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Meeting;
use SBC\BienBundle\Entity\RequeteMeeting;
use SBC\BienBundle\Entity\TacheRequete;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TacheRequeteController
 * @package SBC\BienBundle\Controller
 */
class TacheRequeteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $tacheRequete = new TacheRequete();
        $em = $this->getDoctrine()->getManager();


        $typeTache = $em->getRepository("BienBundle:TypeTache")->find($request->request->get('typetache'));
        $tacheRequete->setTypeTache($typeTache);

        $Requete = $em->getRepository("BienBundle:Requete")->find($request->request->get('requete'));
        $tacheRequete->setRequete($Requete);
        $tacheRequete->setDescription($request->request->get('description'));

        $tacheRequete->setPersonnel($this->getUser()->getPersonnel());
        $success = true;
        $message = '';
        if ($request->request->get('day'))
        {
            $day = $request->request->get('day');
            $begin = $request->request->get('begin');
            $end = $request->request->get('end');
            $begin_date = new \DateTime($day.' '.$begin);
            $end_date = new \DateTime($day.' '.$end);

            $meeting = new RequeteMeeting();
            $meeting->setCreatedBy($this->getUser()->getPersonnel());
            $meeting->addRemindFor($this->getUser()->getPersonnel());
            $meeting->setBeginDate($begin_date);
            $meeting->setFinishDate($end_date);
            $meeting->setClient($Requete->getClient());
            $meeting->setColor("#0277bd");
            $meeting->setTypeMeeting("Sur place");
            $meeting->setStatus("Confirmé");
            $meeting->setDescription($request->request->get('description'));
            $meeting->setRequete($Requete);
            $meeting->setTitle('requete');
            $em->persist($meeting);
            $em->flush();

        }

        try {
            $tacheRequete->getRequete()->setUpdatedAt();
            $em->persist($tacheRequete);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }

    /**
     * @param TacheRequete $tacheRequete
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(TacheRequete $tacheRequete)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($tacheRequete);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));

    }
}