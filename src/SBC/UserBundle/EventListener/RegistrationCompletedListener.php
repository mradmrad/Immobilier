<?php
namespace SBC\UserBundle\EventListener;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;


class RegistrationCompletedListener implements EventSubscriberInterface
{
    private $router;

    private $olduser;

    private $token;


    public function __construct(UrlGeneratorInterface $router, TokenStorage $token)
    {
        $this->olduser = $token->getToken()->getUser();
        $this->router = $router;
        $this->token =$token;

    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationCompleted'
        );
    }

    public function onRegistrationCompleted(FilterUserResponseEvent $event)
    {
        $response = $event->getResponse();
        $this->token->getToken()->setUser($this->olduser);
        $this->token->getToken()->getUser()->setRoles($this->olduser->getRoles());

        $token = new \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken(
            $this->token->getToken()->getUser(),
            null,
            'main',
            $this->token->getToken()->getUser()->getRoles()
        );

        $this->token->setToken($token);

        $response->setTargetUrl($this->router->generate('user_index'));
    }




}