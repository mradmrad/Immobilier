<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TacheMandat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TacheMandatController
 * @package SBC\BienBundle\Controller
 */
class TacheMandatController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $tacheMandat = new TacheMandat();
        $em = $this->getDoctrine()->getManager();

        $typeTache = $em->getRepository("BienBundle:TypeTache")->find($request->request->get('typetache'));
        $tacheMandat->setTypeTache($typeTache);

        $Mandat = $em->getRepository("BienBundle:Mandat")->find($request->request->get('mandat'));
        $tacheMandat->setMandat($Mandat);

        $tacheMandat->setDescription($request->request->get('description'));
        $tacheMandat->setPersonnel($this->getUser()->getPersonnel());

        $success = true;
        $message = '';

        try {
            $tacheMandat->getMandat()->setUpdatedAt();
            $em->persist($tacheMandat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }


    /**
     * @param TacheMandat $tacheMandat
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(TacheMandat $tacheMandat)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($tacheMandat);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }
}
