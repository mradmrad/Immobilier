<?php

namespace SBC\PersonnelBundle\Controller;

use SBC\BienBundle\EventListener\HistoryService;
use SBC\PersonnelBundle\Entity\Personnel;
use SBC\PersonnelBundle\Form\PersonnelType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class PersonnelController
 * @package SBC\PersonnelBundle\Controller
 */
class PersonnelController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction()
    {
        $personnels = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->findAll();

        return $this->render('@Personnel/Personnel/index.html.twig', array(
            'personnels' => $personnels,

        ));
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function listAction()
    {
        $id = $this->getUser()->getId();
        $personnels = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->MyfindAll($id);

        $liste = array();
        foreach ($personnels as $personnel) {
            $liste[] = array(
                'title' => $personnel->getName(),
                'id' => $personnel->getId(),
            );
        }

        return new JsonResponse($liste);
    }

    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function allOrOneByRoleAction()
    {
        if ($this->isGranted('ROLE_SUPER_ADMIN'))
            $personnels = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->meetingsPersonnels();
        else
            $personnels = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->find($this->getUser()->getPersonnel());



        $liste = array();
        foreach ($personnels as $personnel) {
            $liste[] = array(
                'title' => $personnel->getName(),
                'id' => $personnel->getId(),

            );
        }

        return new JsonResponse($liste);
    }


    /**
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function oneAction()
    {

//        if ($this->isGranted('ROLE_SUPER_ADMIN'))
//            $personnels = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->findAll();
//        else
        $personnel = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')
            ->find($this->getUser()->getPersonnel()->getId());

        $liste = array();
//        foreach ($personnels as $personnel) {
        $liste[] = array(
            'title' => $personnel->getName(),
            'id' => $personnel->getId(),

        );
//        }


        return new JsonResponse($liste);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') ")
     */
    public function newAction(Request $request)
    {
        $personnel = new Personnel();
        $date = new \DateTime('now');

        $personnel->setCode('PERS'.$date->getTimestamp());
//        die(var_dump($personnel->getCode()));
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnel);
            $em->flush();

            return $this->redirectToRoute('personnel_show', array('id' => $personnel->getId()));
        }

        return $this->render('@Personnel/Personnel/new.html.twig', array(
            'personnel' => $personnel,
            'form' => $form->createView(),

        ));
    }

    /**
     * @param Personnel $personnel
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction(Personnel $personnel)
    {
        $em = $this->getDoctrine()->getManager();

//        $stats = $em->getRepository('PersonnelBundle:Personnel')->getStatsProfile($personnel->getId());
        $date = new \DateTime('now');
        $goal = $em->getRepository('BienBundle:Goal')->findGoal($date->format('Y-m-d H:i:s'), $personnel);


        $numberOfRecherches = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_BIEN, $personnel);

        $numberOfNouvelles = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_NOUVELLE, $personnel);

        $numberOfAcquisitions = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_ACQUISITION, $personnel);

        $numberOfMandatsVente = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_MANDAT_VENTE, $personnel);

        $numberOfMandatsLocation = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_MANDAT_LOCATION, $personnel);

        $numberOfRequetes = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_REQUETE, $personnel);

        $numberOfTransactionsVente = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_TRANSACTION_VENTE, $personnel);

        $numberOfTransactionsLocation = $em->getRepository('BienBundle:History')
            ->numberByTypeAndPersonnel(HistoryService::ADD_TRANSACTION_LOCATION, $personnel);


        if ($goal != null) {
            $rechercheGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_BIEN, $goal);

            $nouvelleGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_NOUVELLE, $goal);

            $acquisitionGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_ACQUISITION, $goal);

            $mandatVenteGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_MANDAT_VENTE, $goal);

            $mandatLocationGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_MANDAT_LOCATION, $goal);

            $requeteGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_REQUETE, $goal);

            $transactionVenteGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_VENTE, $goal);
            $transactionLocationGoalEfected = $em->getRepository('BienBundle:History')
                ->numberByTypeAndGoal(HistoryService::ADD_TRANSACTION_LOCATION, $goal);


            return $this->render('@Personnel/Personnel/show.html.twig', array(
                'personnel' => $personnel,
//                'stats' => $stats,
                'percentRecherches' => round($rechercheGoalEfected * 100 / $goal->getRechercheGoal()),
                'percentNouvelles' => round($nouvelleGoalEfected * 100 / $goal->getNouvelleGoal()),
                'percentAcquisitions' => round($acquisitionGoalEfected * 100 / $goal->getAcquisitionGoal()),
                'percentMandatsVente' => round($mandatVenteGoalEfected * 100 / $goal->getMandatVenteGoal()),
                'percentMandatsLocation' => round($mandatLocationGoalEfected * 100 / $goal->getMandatLocationGoal()),
                'percentRequetes' => round($requeteGoalEfected * 100 / $goal->getRequeteGoal()),
                'percentTransactionsVente' => round($transactionVenteGoalEfected * 100 / $goal->getTransactionVenteGoal()),
                'percentTransactionsLocation' => round($transactionLocationGoalEfected * 100 / $goal->getTransactionLocationGoal()),

                'numberOfRecherches' => $numberOfRecherches,
                'numberOfNouvelles' => $numberOfNouvelles,
                'numberOfAcquisitions' => $numberOfAcquisitions,
                'numberOfMandatsVente' => $numberOfMandatsVente,
                'numberOfMandatsLocation' => $numberOfMandatsLocation,
                'numberOfRequetes' => $numberOfRequetes,
                'numberOfTransactionsVente' => $numberOfTransactionsVente,
                'numberOfTransactionsLocation' => $numberOfTransactionsLocation,
                'goal' => true
            ));
        } else {
            return $this->render('@Personnel/Personnel/show.html.twig', array(
                'personnel' => $personnel,
//                'stats' => $stats,
                'goal' => false,
                'numberOfRecherches' => $numberOfRecherches,
                'numberOfNouvelles' => $numberOfNouvelles,
                'numberOfAcquisitions' => $numberOfAcquisitions,
                'numberOfMandatsVente' => $numberOfMandatsVente,
                'numberOfMandatsLocation' => $numberOfMandatsLocation,
                'numberOfRequetes' => $numberOfRequetes,
                'numberOfTransactionsVente' => $numberOfTransactionsVente,
                'numberOfTransactionsLocation' => $numberOfTransactionsLocation,

            ));
        }


    }

    /**
     * @param Request $request
     * @param Personnel $personnel
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Personnel $personnel)
    {
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_show', array('id' => $personnel->getId()));
        }

        return $this->render('@Personnel/Personnel/edit.html.twig', array(
            'personnel' => $personnel,
            'form' => $form->createView(),

        ));
    }

    /**
     * @param Personnel $personnel
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Personnel $personnel)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';
        try {
            $em->remove($personnel);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $cin
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getPersonnelByCinAction($cin)
    {
        $personnel = $this->getDoctrine()
            ->getManager()
            ->getRepository('PersonnelBundle:Personnel')
            ->findOneBy(array('cin' => $cin));

        $success = true;

        if ($personnel === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param $code
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getPersonnelByCodeAction($code)
    {
        $personnel = $this->getDoctrine()
            ->getManager()
            ->getRepository('PersonnelBundle:Personnel')
            ->findOneBy(array('code' => $code));

        $success = true;

        if ($personnel === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param $email
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getPersonnelByEmailAction($email)
    {
        $personnel = $this->getDoctrine()
            ->getManager()
            ->getRepository('PersonnelBundle:Personnel')
            ->findOneBy(array('email' => $email));

        $success = true;

        if ($personnel === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param $phonenumber
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getPersonnelByPhoneNumberAction($phonenumber)
    {
        $personnel = $this->getDoctrine()
            ->getManager()
            ->getRepository('PersonnelBundle:Personnel')
            ->findOneBy(array('phonenumber' => $phonenumber));

        $success = true;

        if ($personnel === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param $id
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function byIdAction($id)
    {
        $personnel = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->find($id);

        $liste = array(
            'name' => $personnel->getName(),
            'id' => $personnel->getId(),
        );

        return new JsonResponse($liste);
    }
    /**
     * @param $id
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function filtredTachesAction($id ,$begin , $end)
    {
        $begin_date = \DateTime::createFromFormat('d-m-Y',$begin);
        $end_date = \DateTime::createFromFormat('d-m-Y',$end.' 23:59:0');
        $personnel = $this->getDoctrine()->getManager()->getRepository('PersonnelBundle:Personnel')->find($id);
        $liste = $this->getDoctrine()->getManager()->getRepository('BienBundle:History')->filtredTaches($personnel,$begin_date,$end_date);
        return new JsonResponse(array('liste' =>$liste));
    }
}
