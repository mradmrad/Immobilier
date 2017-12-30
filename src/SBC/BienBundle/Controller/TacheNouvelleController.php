<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\TacheNouvelle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TacheNouvelleController
 * @package SBC\BienBundle\Controller
 */
class TacheNouvelleController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function newAction(Request $request)
    {
        $tacheNouvelle = new TacheNouvelle();
        $em = $this->getDoctrine()->getManager();

        $typeTache = $em->getRepository("BienBundle:TypeTache")->find($request->request->get('typetache'));
        $tacheNouvelle->setTypeTache($typeTache);

        $Nouvelle = $em->getRepository("BienBundle:Bien")->find($request->request->get('nouvelle'));
        $tacheNouvelle->setNouvelle($Nouvelle);

        $tacheNouvelle->setDescription($request->request->get('description'));
        $tacheNouvelle->setPersonnel($this->getUser()->getPersonnel());
        $success = true;
        $message = '';

        try {
            $tacheNouvelle->getNouvelle()->setUpdatedAt();

            $em->persist($tacheNouvelle);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'message' => $message));
    }


    /**
     * @param TacheNouvelle $tacheNouvelle
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(TacheNouvelle $tacheNouvelle)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($tacheNouvelle);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }
}