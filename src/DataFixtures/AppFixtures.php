<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Home;
use App\Entity\Menu;
use App\Entity\DataList;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $home = new Home();
        $home->setName('Home page');
        $manager->persist($home);

        $menu = new Menu();
        $menu->setRoot($menu);
        $menu->setName(' == ROOT == ');
        $menu->setLaveledTitle(' == ROOT == ');
        $menu->setEnabled(1);
        $manager->persist($menu);

        $dataList = new DataList();
        $dataList->setRoot($dataList);
        $dataList->setName(' == ROOT == ');
        $dataList->setLaveledTitle(' == ROOT == ');
        $dataList->setEnabled(1);
        $manager->persist($dataList);

        $manager->flush();
    }
}
