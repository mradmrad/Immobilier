<?php

namespace SBC\MessageBundle\Controller;

use SBC\UserBundle\Entity\User;
use SBC\UserBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use SBC\MessageBundle\Entity\Message;
use SBC\MessageBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class MessageController
 * @package SBC\MessageBundle\Controller
 * @Security("has_role('ROLE_SUPER_ADMIN') or has_role('ROLE_AGENT') or has_role('ROLE_COORDINATEUR') or has_role('ROLE_SUPERVISEUR') or has_role('ROLE_WEB_MARKETING')")
 */
class MessageController extends Controller
{


    /**
 * @return \Symfony\Component\HttpFoundation\Response
 */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('MessageBundle:Message:index.html.twig', array(
            'users' => $users

        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($id = null)
    {
        $me = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $messages = $em
            ->getRepository('MessageBundle:Message')
            ->findAll($me, $id);

        return new JsonResponse($messages);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function addAction(Request $request)
    {
        $message = new Message();
        $em = $this->getDoctrine()->getManager();

        $message->setSender($this->getUser());
        $message->setContent($request->request->get('content'));

        $receiver = $em->getRepository('UserBundle:User')->find($request->request->get('receiver'));
        $message->setReceiver($receiver);


        $success = true;
        $errmessage = '';

        try {
            $em->persist($message);
            $em->flush();
        } catch (\Exception $e) {
            $success = false;
            $errmessage = $e->getMessage();
        }
        return new JsonResponse(array('success' => $success, 'errmessage' => $errmessage));
    }
}
