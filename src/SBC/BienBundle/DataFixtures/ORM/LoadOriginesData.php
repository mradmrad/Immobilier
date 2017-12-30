<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Origine;

class LoadOriginesData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $org1 = new Origine();
        $org1->setName('Agence');

        $org2 = new Origine();
        $org2->setName('Zone');

        $org3 = new Origine();
        $org3->setName('Presse');

        $org4 = new Origine();
        $org4->setName('Revue');

        $org5 = new Origine();
        $org5->setName('Affichage Urbain');

        $org6 = new Origine();
        $org6->setName('Autres agence');

        $manager->persist($org1);
        $manager->persist($org2);
        $manager->persist($org3);
        $manager->persist($org4);
        $manager->persist($org5);
        $manager->persist($org6);

        $manager->flush();
    }
}