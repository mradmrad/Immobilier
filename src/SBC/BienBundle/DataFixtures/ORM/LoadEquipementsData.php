<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Equipement;

class LoadEquipementsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $e1 = new Equipement();
        $e1->setName('Jardin');

        $e2 = new Equipement();
        $e2->setName('Ascenseur');

        $e3 = new Equipement();
        $e3->setName('Garage');

        $e4 = new Equipement();
        $e4->setName('Balcon');

        $e5 = new Equipement();
        $e5->setName('Chauffage central');

        $e6 = new Equipement();
        $e6->setName('Dressing');

        $manager->persist($e1);
        $manager->persist($e2);
        $manager->persist($e3);
        $manager->persist($e4);
        $manager->persist($e5);
        $manager->persist($e6);

        $manager->flush();
    }
}