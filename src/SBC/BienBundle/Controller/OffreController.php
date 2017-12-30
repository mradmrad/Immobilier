<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Mandat;
use SBC\BienBundle\Entity\Offre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OffreController
 * @package SBC\BienBundle\Controller
 */
class OffreController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function addAction(Request $request)
    {
        $offre = new Offre();
        $em = $this->getDoctrine()->getManager();

        $offre->setCode($request->request->get('code'));
        $offre->setProposedPrice(floatval(str_replace(' ', '',
            str_replace(',', '.', $request->request->get('proposedPrice')))));
        $offre->setProposedPriceText($request->request->get('proposedPriceText'));
        $offre->setCreatedBy($this->getUser()->getPersonnel());

        $proposedBy = $em->getRepository('TiersBundle:Client')->find($request->request->get('proposedBy'));
        $mandat = $em->getRepository('BienBundle:Mandat')->find($request->request->get('mandat'));

        $offre->setProposedBy($proposedBy);
        $offre->setMandat($mandat);

        $success = true;
        $message = '';

        try {
            $em->persist($offre);
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

    /**
     * @param Offre $offre
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function refuserAction(Offre $offre)
    {
        $em = $this->getDoctrine()->getManager();
        $offre->setStatus(Offre::NOT_ACCEPTED);

        $success = true;
        $msg = '';
        try {
            $em->persist($offre);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param Offre $offre
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function accepterAction(Offre $offre)
    {
        $em = $this->getDoctrine()->getManager();
        $offre->setStatus(Offre::ACCEPTED);
        $offre->getMandat()->setEtatMandat(Mandat::CONCLU);
        $success = true;
        $msg = '';
        try {
            $em->persist($offre);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }
}
