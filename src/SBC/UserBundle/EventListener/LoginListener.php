<?php
namespace SBC\UserBundle\EventListener;

use Doctrine\ORM\EntityManager;
use SBC\UserBundle\Entity\AccessHistory;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Listener responsible to change the redirection at the end of the password resetting
 */
class LoginListener implements EventSubscriberInterface
{

    private $em;

    private $container;


    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;

    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            SecurityEvents::INTERACTIVE_LOGIN => 'onLogin'
        );
    }


    public function onLogin($event)
    {
        $access = new AccessHistory();

        if ($event instanceof InteractiveLoginEvent) {
            $user = $event->getAuthenticationToken()->getUser();
            $access->setUser($user);
            $this->em->persist($access);
            $this->em->flush();
        }

        $session = $this->container->get('session');
        $session->set('sessionID', $access->getSessionId());
        $session->save();

    }

}