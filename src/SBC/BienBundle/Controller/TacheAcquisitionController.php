<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TacheAcquisition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TacheAcquisitionController
 * @package SBC\BienBundle\Controller
 */
class TacheAcquisitionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $tacheAcquisition = new TacheAcquisition();
        $em = $this->getDoctrine()->getManager();

        $typeTache = $em->getRepository("BienBundle:TypeTache")->find($request->request->get('typetache'));
        $tacheAcquisition->setTypeTache($typeTache);

        $acquisition = $em->getRepository("BienBundle:Acquisition")->find($request->request->get('acquisition'));
        $tacheAcquisition->setAcquisition($acquisition);
        $tacheAcquisition->setDescription($request->request->get('description'));
        $tacheAcquisition->setPersonnel($this->getUser()->getPersonnel());

        $success = true;
        $message = '';

        try {
            $tacheAcquisition->getAcquisition()->setUpdatedAt();
            $em->persist($tacheAcquisition);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));

    }


    /**
     * @param TacheAcquisition $tacheAcquisition
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(TacheAcquisition $tacheAcquisition)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {

            $em->remove($tacheAcquisition);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));

    }
}
