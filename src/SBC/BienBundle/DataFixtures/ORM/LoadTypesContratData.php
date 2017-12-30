<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\TypeContrat;

class LoadTypesContratData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $org1 = new TypeContrat();
        $org1->setName('Location');

        $org2 = new TypeContrat();
        $org2->setName('Vente');

        $org3 = new TypeContrat();
        $org3->setName('Location P.P');

        $org4 = new TypeContrat();
        $org4->setName('Vente F.C');



        $manager->persist($org1);
        $manager->persist($org2);
        $manager->persist($org3);
        $manager->persist($org4);


        $manager->flush();
    }
}