<?php

namespace SBC\BienBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use SBC\BienBundle\Entity\Acquisition;
use SBC\BienBundle\Entity\Bien;
use SBC\BienBundle\Entity\History;
use SBC\BienBundle\Entity\Mandat;
use SBC\BienBundle\Entity\Requete;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class HistoryService implements EventSubscriber
{
    const ADD_BIEN = 'Ajout d\'un bien';
    const UPDATE_BIEN = 'Modification d\'un bien';
    const DELETE_BIEN = 'Suppression d\'un bien';

    const ADD_NOUVELLE = 'Ajout d\'une nouvelle';
    const UPDATE_NOUVELLE = 'Modification d\'une nouvelle';
    const DELETE_NOUVELLE = 'Suppression d\'une nouvelle';

    const ADD_ACQUISITION = 'Ajout d\'une acquisition';
    const UPDATE_ACQUISITION = 'Modification d\'une acquisition';
    const DELETE_ACQUISITION = 'Suppression d\'une acquisition';

    const ADD_MANDAT_VENTE = 'Ajout d\'un mandat de vente';
    const UPDATE_MANDAT_VENTE = 'Modification d\'un mandat de vente';
    const DELETE_MANDAT_VENTE = 'Suppression d\'un mandat de vente';

    const ADD_MANDAT_LOCATION = 'Ajout d\'un mandat de location';
    const UPDATE_MANDAT_LOCATION = 'Modification d\'un mandat de location';
    const DELETE_MANDAT_LOCATION = 'Suppression d\'un mandat de location';

    const ADD_REQUETE = 'Ajout d\'une requête';
    const UPDATE_REQUETE = 'Modification d\'une requête';
    const DELETE_REQUETE = 'Suppression d\'une requête';

    const ADD_TRANSACTION_VENTE = 'Ajout d\'une transaction de vente';
    const ADD_TRANSACTION_LOCATION = 'Ajout d\'une transaction de location';

    private $token;

    public function __construct(TokenStorage $token)
    {
        $this->token = $token;
    }

    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
            'postUpdate',
            'postRemove'
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->update($args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->add($args);
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $this->remove($args);
    }

    public function add(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        $history = new History();


        if ($entity instanceof Acquisition) {

            $history->setAcquisition($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            $history->setDescription(HistoryService::ADD_ACQUISITION);
            $history->setTypeBien($entity->getBien()->getNature());
            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Bien) {


            $history->setBien($entity);

            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());

            if ($entity->getType() == Bien::RECHERCHE) {
                $history->setDescription(HistoryService::ADD_BIEN);
                $history->setTypeBien($entity->getNature());
            } else if ($entity->getType() == Bien::NOUVELLE_NON_CONFIRMEE) {
                $history->setDescription(HistoryService::ADD_NOUVELLE);
                $history->setTypeBien($entity->getNature());
            } else if ($entity->getType() == Bien::NOUVELLE_CONFIRMEE) {
                $history->setDescription(HistoryService::ADD_NOUVELLE);
                $history->setTypeBien($entity->getNature());

            } else if ($entity->getType() == Bien::ACQUISITION) {
                $history->setDescription(HistoryService::ADD_ACQUISITION);
                $history->setTypeBien($entity->getNature());

            } else if ($entity->getType() == Bien::MANDAT) {

                if ($entity->getNature() == Bien::VENTE)
                    $history->setDescription(HistoryService::ADD_MANDAT_VENTE);
                elseif ($entity->getNature() == Bien::LOCATION)
                    $history->setDescription(HistoryService::ADD_MANDAT_LOCATION);

            }

            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Mandat) {
            $history->setMandat($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            if ($entity->getAcquisition()->getBien()->getNature() == Bien::VENTE)
                $history->setDescription(HistoryService::ADD_MANDAT_VENTE);
            elseif ($entity->getAcquisition()->getBien()->getNature() == Bien::LOCATION)
                $history->setDescription(HistoryService::ADD_MANDAT_LOCATION);
            $entityManager->persist($history);
            $history->setTypeBien($entity->getAcquisition()->getBien()->getNature());
            $entityManager->flush();
        } else if ($entity instanceof Requete) {
            $history->setRequete($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            $history->setDescription(HistoryService::ADD_REQUETE);
            $history->setTypeBien($entity->getNatureRequete());
            $entityManager->persist($history);
            $entityManager->flush();
        }
    }
    public function update(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        $history = new History();
        if ($entity instanceof Bien) {
            $history->setBien($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            /** recherche */
            if ($entity->getType() == Bien::RECHERCHE) {
                $history->setDescription(HistoryService::UPDATE_BIEN);
            } /** nouvelle */
            else if ($entity->getType() == Bien::NOUVELLE_NON_CONFIRMEE || $entity->getType() == Bien::NOUVELLE_CONFIRMEE) {


                if ($entity->getTransfert() == 1) {
                    $history->setDescription(HistoryService::ADD_NOUVELLE);
                    $history->setTypeBien($entity->getNature());
                } else {
                    $history->setDescription(HistoryService::UPDATE_NOUVELLE);
                    $history->setTypeBien($entity->getNature());
                }
            }
            /** acquisition */
            else if ($entity->getType() == Bien::ACQUISITION) {
                $history->setDescription(HistoryService::ADD_ACQUISITION . ' et ' . HistoryService::UPDATE_BIEN);
            }
            /** mandat */

            else if ($entity->getType() == Bien::MANDAT) {


                if ($entity->getNature() == Bien::VENTE)
                    $history->setDescription(HistoryService::ADD_MANDAT_VENTE . ' et ' . HistoryService::UPDATE_BIEN);

                else if ($entity->getNature() == Bien::LOCATION)
                    $history->setDescription(HistoryService::ADD_MANDAT_LOCATION . ' et ' . HistoryService::UPDATE_BIEN);

            }


            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Acquisition) {
            $history->setAcquisition($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            $history->setDescription(HistoryService::UPDATE_ACQUISITION);
            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Mandat) {
            $history->setMandat($entity);
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());

            if ($entity->getAcquisition()->getBien()->getNature() == Bien::VENTE)
                $history->setDescription(HistoryService::UPDATE_MANDAT_VENTE);
            elseif ($entity->getAcquisition()->getBien()->getNature() == Bien::LOCATION)
                $history->setDescription(HistoryService::UPDATE_MANDAT_LOCATION);

            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Requete) {
            $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
            $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());
            $history->setDescription(HistoryService::UPDATE_REQUETE);
            $entityManager->persist($history);
            $entityManager->flush();
        }

    }

    public function remove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        $history = new History();
        $history->setPersonnel($this->token->getToken()->getUser()->getPersonnel());
        $history->setAgency($this->token->getToken()->getUser()->getPersonnel()->getAgency());

        if ($entity instanceof Bien) {


            if ($entity->getType() == Bien::RECHERCHE) {
                $history->setDescription(HistoryService::DELETE_BIEN);
            } else if ($entity->getType() == Bien::NOUVELLE_NON_CONFIRMEE) {
                $history->setDescription(HistoryService::DELETE_NOUVELLE);
            } else if ($entity->getType() == Bien::NOUVELLE_CONFIRMEE) {
                $history->setDescription(HistoryService::DELETE_NOUVELLE);

            }

            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Acquisition) {
            $history->setDescription(HistoryService::DELETE_ACQUISITION);
            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Mandat) {

            if ($entity->getAcquisition()->getBien()->getNature() == Bien::VENTE)
                $history->setDescription(HistoryService::DELETE_MANDAT_VENTE);
            elseif ($entity->getAcquisition()->getBien()->getNature() == Bien::LOCATION)
                $history->setDescription(HistoryService::DELETE_MANDAT_LOCATION);

            $entityManager->persist($history);
            $entityManager->flush();
        } else if ($entity instanceof Requete) {
            $history->setDescription(HistoryService::DELETE_REQUETE);
            $entityManager->persist($history);
            $entityManager->flush();
        }
    }
}