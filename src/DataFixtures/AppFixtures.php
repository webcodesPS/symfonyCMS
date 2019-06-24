<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Home;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $home = new Home();
        $home->setName('Home page');
        $manager->persist($home);
        $manager->flush();
    }
}
