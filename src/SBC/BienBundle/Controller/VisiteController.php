<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Visite;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VisiteController
 * @package SBC\BienBundle\Controller
 */
class VisiteController extends Controller
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
            $visite = $this->cast($oldEntity,Visite::class);
            $em->remove($oldEntity);
            $em->flush();
            $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
            $visite->addRemindFor($remindFor);
//            foreach ($bienMeeting->getRemindFors() as $remindFor)
//            {
//                $bienMeeting->removeRemindFor($remindFor);
//            }
        }
        else {
            $visite = new Visite();
        }

        $visite->setCreatedBy($this->getUser()->getPersonnel());
        ($request->request->get('start') != 'null') ? $visite->setBeginDate(new \DateTime($request->request->get('start'))) : '';
//        $visite->setBeginDate(new \DateTime($request->request->get('start')));
        $visite->setColor($request->request->get('color'));
        ($request->request->get('end') != 'null') ? $visite->setFinishDate(new \DateTime($request->request->get('end'))) : '';
//        $visite->setFinishDate(new \DateTime($request->request->get('end')));
        $visite->setTitle($request->request->get('title'));
        $visite->setOtherclients($request->request->get('other'));
        $visite->setOtherNumbers($request->request->get('otherNumbers'));
        $remindFor = $em->getRepository('PersonnelBundle:Personnel')->find($request->request->get('remindFor'));
        $visite->addRemindFor($remindFor);

        $visite->setCreatedBy($this->getUser()->getPersonnel());

        $client = $em->getRepository('TiersBundle:Client')->find($request->request->get('client'));
        $visite->setClient($client);

        $mandat = $em->getRepository('BienBundle:Mandat')->find($request->request->get('mandat'));
        $visite->setMandat($mandat);


        if($request->request->get('remindFors') != '' or $request->request->get('remindFors') != null) {
            $remindFors = explode(",", $request->request->get('remindFors'));
            foreach ($remindFors as $remindFore){
                $visite->addRemindFor($em->getRepository('PersonnelBundle:Personnel')->find($remindFore));
            }

        }

        $visite->setStatus($request->request->get('status'));
        $visite->setTypeMeeting($request->request->get('typeMeeting'));
        $visite->setDescription($request->request->get('description'));

        $success = true;
        $message = '';

        try {
            $em->persist($visite);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();

        }
        return new JsonResponse(array(
            'success' => $success,
            'message' => $message
        ));
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
