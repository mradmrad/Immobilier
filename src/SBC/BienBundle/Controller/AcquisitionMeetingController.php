<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\AcquisitionMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AcquisitionMeetingController
 * @package SBC\BienBundle\Controller
 */
class AcquisitionMeetingController extends Controller
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
            $acquisitionMeeting = $this->cast($oldEntity,AcquisitionMeeting::class);
            $em->remove($oldEntity);
            $em->flush();
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $acquisitionMeeting->addRemindFor($remindFor);
//            foreach ($bienMeeting->getRemindFors() as $remindFor)
//            {
//                $bienMeeting->removeRemindFor($remindFor);
//            }
        }
        else {
            $acquisitionMeeting = new AcquisitionMeeting();
        }


        $acquisitionMeeting->setCreatedBy($this->getUser()->getPersonnel());
        ($request->request->get('start') != 'null') ? $acquisitionMeeting->setBeginDate(new \DateTime($request->request->get('start'))) : '';
//        $acquisitionMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $acquisitionMeeting->setColor($request->request->get('color'));
        ($request->request->get('end') != 'null') ? $acquisitionMeeting->setFinishDate(new \DateTime($request->request->get('end'))) : '';
//        $acquisitionMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $acquisitionMeeting->setTitle($request->request->get('title'));
        $acquisitionMeeting->setOtherclients($request->request->get('other'));

        $acquisition = $em->getRepository('BienBundle:Acquisition')->find($request->request->get('acquisition'));
        $acquisitionMeeting->setAcquisition($acquisition);

        if ($request->request->get('id') == '')
        {
            if ($request->request->get('remindFor') != '') {
                $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
                $acquisitionMeeting->addRemindFor($remindFor);
            }
        }

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $acquisitionMeeting->setClient($client);

        if($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore){
                $acquisitionMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }

        }
        $acquisitionMeeting->setOtherNumbers($request->request->get('otherNumbers'));
        $acquisitionMeeting->setStatus($request->request->get('status'));
        $acquisitionMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $acquisitionMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
//            $acquisitionMeeting->getAcquisition()->setUpdatedAt();
            $em->persist($acquisitionMeeting);
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