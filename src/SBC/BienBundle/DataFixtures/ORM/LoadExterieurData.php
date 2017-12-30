<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Equipement;
use SBC\BienBundle\Entity\Exterieur;

class LoadExterieurData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $e1 = new Exterieur();
        $e1->setName('Jardin');

        $e2 = new Exterieur();
        $e2->setName('Cours');

        $e3 = new Exterieur();
        $e3->setName('Escalier');

        $e4 = new Exterieur();
        $e4->setName('Entrée directe');

        $e5 = new Exterieur();
        $e5->setName('Piscine');

        $e6 = new Exterieur();
        $e6->setName('Cuisine externe');

        $e7 = new Exterieur();
        $e7->setName('Jardin');

        $e8 = new Exterieur();
        $e8->setName('Jardin');

        $e9 = new Exterieur();
        $e9->setName('Jardin');



        $manager->persist($e1);
        $manager->persist($e2);
        $manager->persist($e3);
        $manager->persist($e4);
        $manager->persist($e5);
        $manager->persist($e6);

        $manager->flush();
    }
}