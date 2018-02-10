<?php

namespace SBC\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use SBC\BienBundle\EventListener\HistoryService;
use SBC\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


/**
 * Class ProfileController
 * @package SBC\UserBundle\Controller
 */
class ProfileController extends BaseController
{
    /**
     * Function to show user profil by username, anonymous can see profiles
     * Profile of a person
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function showUserAction(User $user)
    {
        if (!$this->isGranted('ROLE_SUPER_ADMIN')) {
            throw new AccessDeniedHttpException('AccessDenied');
        }

//        $stats = $this->getDoctrine()->getRepository('PersonnelBundle:Personnel')->getStatsProfile($user->getPersonnel()->getId());
        $em = $this->getDoctrine()->getManager();
        $personnel = $user->getPersonnel();
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

        return $this->render('UserBundle:Profile:show.html.twig', array(
            'user' => $user,
//            'stats' => $stats
            'numberOfRecherches' => $numberOfRecherches,
            'numberOfNouvelles' => $numberOfNouvelles,
            'numberOfAcquisitions' => $numberOfAcquisitions,
            'numberOfMandatsVente' => $numberOfMandatsVente,
            'numberOfMandatsLocation' => $numberOfMandatsLocation,
            'numberOfRequetes' => $numberOfRequetes,
            'numberOfTransactionsVente' => $numberOfTransactionsVente,
            'numberOfTransactionsLocation' => $numberOfTransactionsLocation
        ));
    }

    /**
     * Profile of cuurent user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof User) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

//        $stats = $this->getDoctrine()->getRepository('PersonnelBundle:Personnel')->getStatsProfile($user->getPersonnel()->getId());
        $em = $this->getDoctrine()->getManager();
        $personnel = $user->getPersonnel();
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

        return $this->render('UserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'numberOfRecherches' => $numberOfRecherches,
            'numberOfNouvelles' => $numberOfNouvelles,
            'numberOfAcquisitions' => $numberOfAcquisitions,
            'numberOfMandatsVente' => $numberOfMandatsVente,
            'numberOfMandatsLocation' => $numberOfMandatsLocation,
            'numberOfRequetes' => $numberOfRequetes,
            'numberOfTransactionsVente' => $numberOfTransactionsVente,
            'numberOfTransactionsLocation' => $numberOfTransactionsLocation

//            'stats' => $stats
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function indexAction($enabled)
    {

        $users = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findAll($enabled);

        return $this->render('UserBundle:Profile:users.html.twig', array(
                'users' => $users
            )
        );
    }




    /**
     * edit current user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();

        if (!is_object($user) || !$user instanceof User) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $form = $this->createForm(\SBC\UserBundle\Form\Type\ProfileFormType::class, $user);
        $form->setData($user);
        $form->handleRequest($request);
        $roles = $user->getRoles();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setRoles($roles);
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updatePassword($user);
            $em->flush();

            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('UserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView(),
            'user' => $user
        ));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editUserAction(Request $request, User $user)
    {

        $form = $this->createForm(\SBC\UserBundle\Form\Type\ProfileEditFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updatePassword($user);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        
        return $this->render('@User/Profile/editUser.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),

        ));
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';

        try {
            $em->remove($user);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function enableOrDisableUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $success = true;
        $msg = '';

        $user->setEnabled(!$user->isEnabled());
        try {
            $em->persist($user);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $msg = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'mesgerror' => $msg));
    }

    /**
     * @param $email
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getUserByEmailAction($email)
    {
        $user = $this->getDoctrine()
            ->getManager()
            ->getRepository('UserBundle:User')
            ->findOneBy(array('email' => $email));

        $success = true;

        if ($user === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }

    /**
     * @param $username
     * @return JsonResponse
     * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
     */
    public function getUserByUserNameAction($username)
    {
        $user = $this->getDoctrine()
            ->getManager()
            ->getRepository('UserBundle:User')
            ->findOneBy(array('username' => $username));

        $success = true;

        if ($user === null)
            $success = false;

        return new JsonResponse(array('success' => $success));
    }


//    /**
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse
//     */
//    public function confirmedAction()
//    {
//        return $this->redirect($this->generateUrl('user_index'));
//    }
}