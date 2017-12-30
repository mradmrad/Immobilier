<?php

namespace Alpha\VisitorTrackingBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class VisitorsController
 * @package Alpha\VisitorTrackingBundle\Controller
 * @Security("has_role('ROLE_SUPER_ADMIN')")
 */
class VisitorsController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function visitsAction()
    {

        $em = $this->getDoctrine()->getManager()->getRepository('AlphaVisitorTrackingBundle:Session');



        $visitors = $em->findAll();
        $countriesVisitors = $em->findAllByCountry();
        $listeCountries = array();
        $totalVisits = count($countriesVisitors) + 1;
        foreach ($countriesVisitors as $countryVisitor) {
            $listeCountries[] = array(
                'pays' => $countryVisitor['pays'],
                'value' => ($countryVisitor[1] / $totalVisits) * 100
            );
        }
        $em2 = $this->getDoctrine()
            ->getManager()->getRepository('AlphaVisitorTrackingBundle:PageView');

        $pagesMostVisited = $em2->findAllGroupByUrl();
        $listePages = array();
        foreach ($pagesMostVisited as $pageMostVisited) {
            $listePages[] = array(
                'url' => $pageMostVisited['url'],
                'value' => $pageMostVisited[1]
            );
        }
        return $this->render('@AlphaVisitorTracking/Visits/visits.html.twig', array(
            'visitors' => $visitors,
            'listeCountries' => $listeCountries,
            'listePages' => $listePages

        ));
    }

    /**
     * @return JsonResponse
     */
    public function numberOfVisitorsAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('AlphaVisitorTrackingBundle:Session');
        $visitors = $em->findAllByDate();

        $liste = array();
        foreach ($visitors as $visitor) {
            $date = new \DateTime($visitor['createdDate']->format('Y-m-d'));
            $liste[] = array(
                'date' => $date->format('Y-m-d'),
                'value' => $visitor[1]

            );
        }
        return new JsonResponse($liste);
    }

    /**
     * @return JsonResponse
     */
    public function mostCountriesVisitedAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('AlphaVisitorTrackingBundle:Session');
        $countriesVisitors = $em->findAllByCountry();
        $listeCountries = array();
        $totalVisits = count($countriesVisitors);
        foreach ($countriesVisitors as $countryVisitor) {

            $listeCountries[] = array(
                '"' . $countryVisitor['pays'] . '""' => '[' . ($countryVisitor[1] / $totalVisits) * 100 . ']'

            );
        }
        return new JsonResponse($listeCountries);
    }
}