<?php

namespace App\DataFixtures;

use App\Entity\ContentElement;
use App\Entity\Element;
use App\Entity\Page;
use App\Entity\ContentPage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Menu;
use App\Entity\DataList;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setName('Home page');
        $page->setSlug('Home page');
        $page->setEnabled(1);
        $manager->persist($page);

        $content = new ContentPage();
        $content->setPage($page);
        $content->setLocale($this->container->getParameter('defaults')['locale']);
        $content->setName('home page');
        $content->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit...');
        $manager->persist($content);

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

//        $elements = $manager->getRepository(Element::class)->findAll();
//        foreach ($elements as $element) {
//            $elementContent = new ContentElement();
//            $elementContent->setElement($element);
//            $elementContent->setLocale('en');
//            $elementContent->setContent($element->getName().'-EN');
//            $manager->persist($elementContent);
//        }

        $manager->flush();
    }
}
