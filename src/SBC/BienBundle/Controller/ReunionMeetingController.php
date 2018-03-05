<?php

namespace SBC\BienBundle\Controller;


use SBC\BienBundle\Entity\ReunionMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReunionMeetingController
 * @package SBC\BienBundle\Controller
 */
class ReunionMeetingController extends Controller
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
            $reunionMeeting = $this->cast($oldEntity,ReunionMeeting::class);
            $em->remove($oldEntity);
            $em->flush();
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $reunionMeeting->addRemindFor($remindFor);
//            foreach ($bienMeeting->getRemindFors() as $remindFor)
//            {
//                $bienMeeting->removeRemindFor($remindFor);
//            }
        }
        else {
            $reunionMeeting = new ReunionMeeting();
        }

        $reunionMeeting->setCreatedBy($this->getUser()->getPersonnel());
        ($request->request->get('start') != 'null') ? $reunionMeeting->setBeginDate(new \DateTime($request->request->get('start'))) : '';
//        $reunionMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $reunionMeeting->setColor($request->request->get('color'));
        ($request->request->get('end') != 'null') ? $reunionMeeting->setFinishDate(new \DateTime($request->request->get('end'))) : '';
//        $reunionMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $reunionMeeting->setTitle($request->request->get('title'));
        $reunionMeeting->setOtherclients($request->request->get('other'));

        if ($request->request->get('id') == '')
        {
            if ($request->request->get('remindFor') != '') {
                $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
                $reunionMeeting->addRemindFor($remindFor);
            }
        }

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $reunionMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $reunionMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }
        $reunionMeeting->setOtherNumbers($request->request->get('otherNumbers'));
        $reunionMeeting->setStatus($request->request->get('status'));
        $reunionMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $reunionMeeting->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($reunionMeeting);
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