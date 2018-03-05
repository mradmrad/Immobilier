<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\Meeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



/**
 * Class MeetingController
 * @package SBC\BienBundle\Controller
 */
class MeetingController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function indexAction()
    {
        return $this->render('@Bien/Meeting/index.html.twig');
    }

    /**
     * @param Meeting $meeting
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->request->get('id');
        $em = $this->getDoctrine()->getManager();
        $meeting = $em->getRepository('BienBundle:Meeting')->find($id);
        $success = true;
        $msg = '';
        try {
            $em->remove($meeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

//        if ($this->isGranted('ROLE_SUPER_ADMIN'))
            $meetings = $em->getRepository('BienBundle:Meeting')->findAll();
//        else
//            $meetings = $em->getRepository('PersonnelBundle:Personnel')->find($this->getUser()->getPersonnel()->getId())->getMeetings();

        $events = array();
        foreach ($meetings as $meeting) {

            foreach ($meeting->getRemindFors() as $remindFor) {
                $remindFors = array();
                $hiddenDatas = array();
                switch ($meeting->getTitle()) {
                    case 'RDV pour une recherche':

                       $hiddenDatas[] = array('zone'=>$meeting->getZone(),'rue'=>$meeting->getRue());
                        break;
                    case 'RDV pour une acquisition':

                        $hiddenDatas[] = ($meeting->getNouvelle() != null ) ? array('nouvelleId'=>$meeting->getNouvelle()->getId()): '';
                        break;
                    case 'RDV pour une prise mandat':
                        $hiddenDatas[] = ($meeting->getAcquisition() != null ) ? array('acquisitionId'=>$meeting->getAcquisition()->getId()): '';
                        break;
                    case 'RDV pour une visite':
//                        $hiddenDatas[] = ($meeting->getNouvelle() != null ) ? array('mandatId'=>$meeting->getNouvelle()->getId()): '';
                       $hiddenDatas[] = array();
                        break;
                    case 'RDV pour une prise offre':
                        $hiddenDatas[] = ($meeting->getMandat() != null ) ? array('mandatId'=>$meeting->getMandat()->getId(),'price'=>$meeting->getProposedPrice()): '';
                        break;
                    case 'RDV pour une acceptation':
                        $hiddenDatas[] = ($meeting->getMandat() != null ) ? array('mandatId'=>$meeting->getMandat()->getId(),'price'=>$meeting->getProposedPrice()): '';
                        break;
                    case 'RDV pour une évaluation':
                        $hiddenDatas[] = array();
                        break;
                    case 'RDV pour une réunion':
                        $hiddenDatas[] = array();
                        break;
                    case 'Autre':
                        $hiddenDatas[] = array();
                    break;
                    default:
                        break;

                }
                foreach ($meeting->getRemindFors() as $remindFore)
                {
                    $remindFors[] = array('id'=> $remindFore->getId(),'name'=> $remindFore->getName());
                }

                $manyReminders = ($meeting->getRemindFors()->count() > 1) ? false : true;



                $events[] = array(
                    'id' => $meeting->getId(),
                    'title' => $meeting->getTitle(),
                    'start' => $meeting->getBeginDate()->format('Y-m-d H:i'),
                    'end' => $meeting->getFinishDate()->format('Y-m-d H:i'),
                    'color' => $meeting->getColor(),
                    'resourceId' => $remindFor->getId(),
                    'createdBy' => $meeting->getCreatedBy()->getName(),
                    'remindFor' => $remindFor->getName(),
                    'status' => $meeting->getStatus(),
                    'typeMeeting' => $meeting->getTypeMeeting(),
                    'otherNumbers' => $meeting->getOtherNumbers(),
                    'remindFors' => $remindFors,
                    'client' =>  ($meeting->getClient() == null)? '-' : $meeting->getClient()->getCode(),
                    'clientName' =>($meeting->getClient() == null)? '-' : $meeting->getClient()->getPrenom().' '.$meeting->getClient()->getDenomination(),
                    'tel' => ($meeting->getClient() == null)? '-' : $meeting->getClient()->getTel(),
                    'others' => $meeting->getOtherClients(),
                    'manyReminds' => $manyReminders,
                    'resourceEditable' => $manyReminders,
                    'description' => $meeting->getDescription(),
                    'hiddenDatas'=>$hiddenDatas
                );
            }
        }

//        die();
        return new JsonResponse($events);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $meeting = $em->getRepository('BienBundle:Meeting')->find($request->request->get('id'));

        $meeting->setBeginDate(new \DateTime($request->request->get('start')));
        $meeting->setFinishDate(new \DateTime($request->request->get('end')));

        if ($request->request->get('status') != '' && $request->request->get('typeMeeting') != ''
            && $request->request->get('title') != ''
        ) {
            $meeting->setStatus($request->request->get('status'));
            $meeting->setTypeMeeting($request->request->get('typeMeeting'));
            $meeting->setTitle($request->request->get('title'));
        }

        if ($request->request->get('description') != '') {
            $meeting->setDescription($request->request->get('description'));

        }

        if ($request->request->get('resourceEditable') == 'true') {
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')
                ->find($request->request->get('remindFor'));

            foreach ($meeting->getRemindFors() as $remindFore) {
                $meeting->removeRemindFor($remindFore);
            }
            $meeting->addRemindFor($remindFor);
        }

        $success = true;
        $message = '';

        try {
            $em->persist($meeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }

}