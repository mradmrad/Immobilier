<?php

namespace SBC\ImmobilierBundle\Controller;

use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\Goal;
use SBC\BienBundle\EventListener\HistoryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashBoardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reminders = $em->getRepository('BienBundle:Remind')->findByUser($this->getUser()->getPersonnel());
        $em_goals = $this->getDoctrine()->getManager()->getRepository('BienBundle:History');
        $goal = $this->getDoctrine()->getManager()->getRepository('BienBundle:Goal')->findGoal(new \DateTime('now'),$this->getUser()->getPersonnel());

             $objectifs = true ;
        $rechercheGoalEfected = 0 ;
        $nouvelleGoalEfected = 0;
        $acquisitionGoalEfected = 0;
        $mandatVenteGoalEfected = 0;
        $mandatLocationGoalEfected = 0;
        $requeteGoalEfected = 0;
        $transactionVenteGoalEfected = 0;
        $transactionLocationGoalEfected = 0;
//        die(var_dump($goal));
               if ($goal != null)
        {
            $rechercheGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_BIEN, $goal);
            $nouvelleGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_NOUVELLE, $goal);
            $acquisitionGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_ACQUISITION, $goal);
            $mandatVenteGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_MANDAT_VENTE, $goal);
            $mandatLocationGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_MANDAT_LOCATION, $goal);
            $requeteGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_REQUETE, $goal);
            $transactionVenteGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_VENTE, $goal);
            $transactionLocationGoalEfected = $em_goals->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_LOCATION, $goal);
        }

        else
        {
            $objectifs = false ;
        }


        $requetes = $em->getRepository('BienBundle:Requete')->findAll();
        $nouvelles = $em->getRepository('BienBundle:Bien')->getAll(Bien::NOUVELLE_CONFIRMEE, Bien::NOUVELLE_NON_CONFIRMEE);
        $mandats = $em->getRepository('BienBundle:Mandat')->findAll();
        $acquisitions = $em->getRepository('BienBundle:Acquisition')->findAll();
        if ( $objectifs == true)
        {
            return $this->render('ImmobilierBundle:DashBoard:accueil.html.twig', array(
                    'acquisitions' => $acquisitions,
                    'requetes' => $requetes,
                    'nouvelles' => $nouvelles,
                    'mandats' => $mandats,
                    'objectifs' => $objectifs,
                    'percentRecherches' => round($rechercheGoalEfected * 100 / $goal->getRechercheGoal()),
                    'percentNouvelles' => round($nouvelleGoalEfected * 100 / $goal->getNouvelleGoal()),
                    'percentAcquisitions' => round($acquisitionGoalEfected * 100 / $goal->getAcquisitionGoal()),
                    'percentMandatsVente' => round($mandatVenteGoalEfected * 100 / $goal->getMandatVenteGoal()),
                    'percentMandatsLocation' => round($mandatLocationGoalEfected * 100 / $goal->getMandatLocationGoal()),
                    'percentRequetes' => round($requeteGoalEfected * 100 / $goal->getRequeteGoal()),
                    'percentTransactionsVente' => round($transactionVenteGoalEfected * 100 / $goal->getTransactionVenteGoal()),
                    'percentTransactionsLocation' => round($transactionLocationGoalEfected * 100 / $goal->getTransactionLocationGoal()),
                    'reminders' => $reminders)
            );
        }
        else
        {
            return $this->render('ImmobilierBundle:DashBoard:accueil.html.twig', array(
                    'acquisitions' => $acquisitions,
                    'requetes' => $requetes,
                    'nouvelles' => $nouvelles,
                    'mandats' => $mandats,
                    'objectifs' => $objectifs,
                    'percentRecherches' => '',
                    'percentNouvelles' => '',
                    'percentAcquisitions' =>'',
                    'percentMandatsVente' => '',
                    'percentMandatsLocation' => '',
                    'percentRequetes' => '',
                    'percentTransactionsVente' => '',
                    'percentTransactionsLocation' => '',
                    'reminders' => $reminders)
            );
        }

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function agencyReportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $agency = $em->getRepository('BienBundle:Agency')->find($this->getUser()->getPersonnel()->getAgency()->getId());

        $stats = array();
        foreach ($agency->getPersonnels() as $personnel) {
            $goal = new Goal();
            $goal->setGoalFor($personnel);

            // edit this
            $goal->setBeginDate(new \DateTime('now'));
            $goal->setFinishDate(new \DateTime('now'));
            $goal->setAgency($agency);
            $stats["addedrecherches"][$personnel->getId()] = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_BIEN, $goal);
        }

        return $this->render('ImmobilierBundle:DashBoard:rapportAgence.html.twig', array(
                'agency' => $agency,
                'stats' => $stats
            )
        );
    }

}
