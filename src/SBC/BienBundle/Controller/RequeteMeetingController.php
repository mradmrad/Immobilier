<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\RequeteMeeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequeteMeetingController
 * @package SBC\BienBundle\Controller
 */
class RequeteMeetingController extends Controller
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
            $requeteMeeting = $this->cast($oldEntity,RequeteMeeting::class);
            $em->remove($oldEntity);
            $em->flush();
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $requeteMeeting->addRemindFor($remindFor);
//            foreach ($bienMeeting->getRemindFors() as $remindFor)
//            {
//                $bienMeeting->removeRemindFor($remindFor);
//            }
        }
        else {
            $requeteMeeting = new RequeteMeeting();
        }

        $requeteMeeting->setCreatedBy($this->getUser()->getPersonnel());
        ($request->request->get('start') != 'null') ? $requeteMeeting->setBeginDate(new \DateTime($request->request->get('start'))) : '';
//        $requeteMeeting->setBeginDate(new \DateTime($request->request->get('start')));
        $requeteMeeting->setColor($request->request->get('color'));
        ($request->request->get('end') != 'null') ? $requeteMeeting->setFinishDate(new \DateTime($request->request->get('end'))) : '';
//        $requeteMeeting->setFinishDate(new \DateTime($request->request->get('end')));
        $requeteMeeting->setTitle($request->request->get('title'));
        $requeteMeeting->setOtherclients($request->request->get('other'));

        $requete = $em->getRepository('BienBundle:Requete')->find($request->request->get('requete'));
        $requeteMeeting->setRequete($requete);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $requeteMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }

        $client = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $requeteMeeting->setClient($client);

        if ($request->request->get('remindFors') != '') {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore) {
                $requeteMeeting->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }
        }
        $requeteMeeting->setOtherNumbers($request->request->get('otherNumbers'));
        $requeteMeeting->setStatus($request->request->get('status'));
        $requeteMeeting->setTypeMeeting($request->request->get('typeMeeting'));
        $requeteMeeting->setDescription($request->request->get('description'));
        $success = true;
        $message = '';

        try {
//            $requeteMeeting->getRequete()->setUpdatedAt();
            $em->persist($requeteMeeting);
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
