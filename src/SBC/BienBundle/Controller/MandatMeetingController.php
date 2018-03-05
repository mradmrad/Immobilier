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
        $em = $this->getDoctrine()->getManager();
        if ($request->request->get('id') != '')
        {
            $oldEntity = $em->getRepository('BienBundle:Meeting')->find($request->request->get('id'));
            $mandatMeeting = $this->cast($oldEntity,MandatMeeting::class);
            $em->remove($oldEntity);
            $em->flush();
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $mandatMeeting->addRemindFor($remindFor);
//            foreach ($bienMeeting->getRemindFors() as $remindFor)
//            {
//                $bienMeeting->removeRemindFor($remindFor);
//            }
        }
        else {
            $mandatMeeting = new MandatMeeting();
        }

        $mandatMeeting->setCreatedBy($this->getUser()->getPersonnel());
        ($request->request->get('start') != 'null') ? $mandatMeeting->setBeginDate(new \DateTime($request->request->get('start'))) : '';
//        $mandatMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $mandatMeeting->setColor($request->request->get('color'));
        ($request->request->get('end') != 'null') ? $mandatMeeting->setFinishDate(new \DateTime($request->request->get('end'))) : '';
//        $mandatMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $mandatMeeting->setTitle($request->request->get('title'));
        $mandatMeeting->setOtherclients($request->request->get('other'));

        if ($request->request->get('id') == '')
        {
            if ($request->request->get('remindFor') != '') {
                $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
                $mandatMeeting->addRemindFor($remindFor);
            }
        }

        $mandat = $em->getRepository('BienBundle:Mandat')
            ->find($request->request->get('mandat'));
        $mandatMeeting->setMandat($mandat);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $mandatMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $client = $em->getRepository('TiersBundle:Client')
            ->find($request->request->get('client'));
        $mandatMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $mandatMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }
        
        $mandatMeeting->setOtherNumbers($request->request->get('otherNumbers'));
        $mandatMeeting->setStatus($request->request->get('status'));
        $mandatMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $mandatMeeting->setTypeMandaMeeting($request->request->get('typeMandatMeeting'));
        $mandatMeeting->setProposedPrice((float) str_replace(',', '.',
            str_replace(" ", "", $request->request->get('proposedPrice'))));
        $mandatMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
//            $mandatMeeting->getMandat()->setUpdatedAt();

            $em->persist($mandatMeeting);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }
    function cast($object, $class) {

        /**
         * This is a beautifully ugly hack.
         *
         * First, we serialize our object, which turns it into a string, allowing
         * us to muck about with it using standard string manipulation methods.
         *
         * Then, we use preg_replace to change it's defined type to the class
         * we're casting it to, and then serialize the string back into an
         * object.
         */
        return unserialize(
            preg_replace(
                '/^O:\d+:"[^"]++"/',
                'O:'.strlen($class).':"'.$class.'"',
                serialize($object)
            )
        );
    }
}