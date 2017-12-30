<?php

namespace SBC\BienBundle\Controller;

use SBC\BienBundle\Entity\Goal;
use SBC\BienBundle\EventListener\HistoryService;
use SBC\BienBundle\Form\GoalType;
use SBC\PersonnelBundle\Entity\Personnel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GoalController
 * @package SBC\BienBundle\Controller
 */
class GoalController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
       $goals = $this->getDoctrine()->getManager()->getRepository('BienBundle:Goal')->findAll();

        return $this->render('@Bien/Goal/index.html.twig', array(
            'goals' => $goals,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $goal = new Goal();
        $goal->setCreatedBy($this->getUser()->getPersonnel());

        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($goal);
            $em->flush();

            return $this->redirectToRoute('goal_show', array('id' => $goal->getId()));
        }

        return $this->render('@Bien/Goal/new.html.twig', array(
            'goal' => $goal,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Goal $goal
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showAction(Goal $goal)
    {
        
        $em = $this->getDoctrine()->getManager()->getRepository('BienBundle:History');

        $rechercheGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_BIEN, $goal);
        $nouvelleGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_NOUVELLE, $goal);
        $acquisitionGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_ACQUISITION, $goal);
        $mandatVenteGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_MANDAT_VENTE, $goal);
        $mandatLocationGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_MANDAT_LOCATION, $goal);
        $requeteGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_REQUETE, $goal);
        $transactionVenteGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_VENTE, $goal);
        $transactionLocationGoalEfected = $em->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_LOCATION, $goal);

        return $this->render('@Bien/Goal/show.html.twig', array(
            'goal' => $goal,
            'percentRecherches' => round($rechercheGoalEfected * 100 / $goal->getRechercheGoal()),
            'percentNouvelles' => round($nouvelleGoalEfected * 100 / $goal->getNouvelleGoal()),
            'percentAcquisitions' => round($acquisitionGoalEfected * 100 / $goal->getAcquisitionGoal()),
            'percentMandatsVente' => round($mandatVenteGoalEfected * 100 / $goal->getMandatVenteGoal()),
            'percentMandatsLocation' => round($mandatLocationGoalEfected * 100 / $goal->getMandatLocationGoal()),
            'percentRequetes' => round($requeteGoalEfected * 100 / $goal->getRequeteGoal()),
            'percentTransactionsVente' => round($transactionVenteGoalEfected * 100 / $goal->getTransactionVenteGoal()),
            'percentTransactionsLocation' => round($transactionLocationGoalEfected * 100 / $goal->getTransactionLocationGoal())
        ));
    }

    /**
     * @param Request $request
     * @param Goal $goal
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Goal $goal)
    {
        $editForm = $this->createForm(GoalType::class, $goal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('goal_show', array('id' => $goal->getId()));
        }

        return $this->render('@Bien/Goal/edit.html.twig', array(
            'goal' => $goal,
            'form' => $editForm->createView()
        ));
    }

    /**
     * @param Goal $goal
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function deleteAction(Goal $goal)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($goal);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $code
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function findByCodeAction($code)
    {
        $goal = $this->getDoctrine()
            ->getManager()
            ->getRepository('BienBundle:Goal')
            ->findOneBy(array('code' => $code));

        $success = true;

        if ($goal === null)
            $success = false;
        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param Personnel $personnel
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function checkIfAPersonnelHasAGoalAction(Personnel $personnel)
    {
        $goal = $this->getDoctrine()->getManager()->getRepository('BienBundle:Goal')->findOneBy(array('goalFor' => $personnel));
        $success = true;

        if ($goal === null)
            $success = false;

        return new JsonResponse(array('success' => $success, 'goal' => $goal));
    }
}