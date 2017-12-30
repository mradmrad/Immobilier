<?php

namespace SBC\BienBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SBC\BienBundle\Entity\Category;

class LoadCategoriesData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ct1 = new Category();
        $ct1->setName('Résidentiel');

        $ct2 = new Category();
        $ct2->setName('Professionel');

        $manager->persist($ct1);
        $manager->persist($ct2);

        $manager->flush();
    }
}