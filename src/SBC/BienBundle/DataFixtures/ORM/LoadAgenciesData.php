<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Agency;

class LoadAgenciesData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Agency();
        $a1->setName('Agence mégrine');
        $a1->setDescription('Mégrine est une ville qui constitue une opportunité d’investissement des plus attractives sur le marché de l’immobilier en termes de style de vie. Notre Agence Immobilière Green Duck se situe dans l’avenue principale de la zone dynamique de Mégrine. Elle gère le grand Tunis et principalement la Banlieue Sud. Green Duck met à votre service les compétences d’une équipe jeune, dynamique et professionnel dans le domaine de l’immobilier et les stratégies de commercialisation nécessaires pour la conclusion de la vente, l’achat ou la location dans les meilleures conditions. Et elle vous offre un portefeuille riche et varié de biens résidentiels (villa, duplex, étage de villa, rez de chaussée de villa, penthouse, appartement et terrain résidentiel..) et ainsi que de biens administratifs et commerciaux (bureaux, administration, locaux commerciaux, droit au bail, terrain de promotion immobilière, terrain industriel, entrepôt, et usine..).');

        $a2 = new Agency();
        $a2->setName('Agence ezzahra');
        $a2->setDescription('Ouverture prochaine');

        $a3 = new Agency();
        $a3->setName('Agence Manzah / El-Manar');
        $a3->setDescription('Ouverture prochaine');

        $a4 = new Agency();
        $a4->setName('Agence Les jardins de carthage');
        $a4->setDescription('Ouverture prochaine');

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);
        $manager->persist($a4);

        $manager->flush();
    }
}