<?php

namespace SBC\UserBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutListener implements LogoutHandlerInterface
{

    private $em;

    private $container;

    private $sessionID;

    private $token;

    public function __construct(EntityManager $entityManager, Container $container, TokenStorage $token)
    {
        $this->em = $entityManager;
        $this->container = $container;

        //get sessionID before that session get null
        $this->sessionID = $container->get('session')->get('sessionID');

        $this->token = $token;
    }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {

        $access = $this->em->getRepository('UserBundle:AccessHistory')->getLastAccess($this->token->getToken()->getUser(), $this->sessionID);
        $access->setLogoutDate(new \DateTime('now'));
        $this->em->persist($access);
        $this->em->flush();

    }


}