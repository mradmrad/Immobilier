<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Commodite;

class LoadCommoditesData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $com1 = new Commodite();
        $com1->setName('Station Bus');

        $com2 = new Commodite();
        $com2->setName('Lycée');

        $com3 = new Commodite();
        $com3->setName('Compus universitaire');

        $manager->persist($com1);
        $manager->persist($com2);
        $manager->persist($com3);

        $manager->flush();
    }
}