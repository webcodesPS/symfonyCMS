<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Menu;
use App\Entity\DataList;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setName('Home page');
        $page->setSlug('Home page');
        $manager->persist($page);

        $menu = new Menu();
        $menu->setRoot($menu);
        $menu->setPage($page);
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
