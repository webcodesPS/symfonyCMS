<?php

namespace App\Repository;

use App\Entity\DataList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class DataListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DataList::class);
    }

    public function moveUp($area)
    {
        $em = $this->_em;
        $repositor = $em->getRepository('App\Entity\DataList');
        $area_upper = $repositor->findOneBy(['right'=>($area->getLeft()-1)]);
        if ($area_upper) {
            $del_1 = $area->getRight() - $area->getLeft();
            $del_2 = $area_upper->getRight() - $area_upper->getLeft();

            $area->setLeft($area_upper->getLeft());
            $area->setRight($area->getLeft() + $del_1);
            $area_upper->setLeft($area->getRight()+1);
            $area_upper->setRight($area_upper->getLeft() + $del_2);

            $end = 0;
            $repositor->postOrderTraversal($area_upper, $area_upper->getLeft() , $end, $em);
            $repositor->postOrderTraversal($area, $area->getLeft() , $end, $em);

            $em->persist($area);
            $em->persist($area_upper);
            $em->flush();
        }
    }

    public function moveDown($area)
    {
        $em = $this->_em;
        $repositor = $em->getRepository('App\Entity\DataList');
        $area_under = $repositor->findOneBy(['left'=>($area->getRight()+1)]);
        if ($area_under) {
            $del_1 = $area->getRight() - $area->getLeft();
            $del_2 = $area_under->getRight() - $area_under->getLeft();

            $area_under->setLeft($area->getLeft());
            $area_under->setRight($area->getLeft() + $del_2);
            $area->setLeft($area_under->getRight() + 1);
            $area->setRight($area->getLeft() + $del_1);

            $end = 0;
            $repositor->postOrderTraversal($area_under, $area_under->getLeft() , $end, $em);
            $repositor->postOrderTraversal($area, $area->getLeft() , $end, $em);

            $em->persist($area);
            $em->persist($area_under);
            $em->flush();
        }
    }

    public function postOrderTraversal($tree, $begin, &$end, $em)
    {
        $children = $em->getRepository('App\Entity\DataList')
            ->getChildren($tree->getId());
        $tree->setLeft($begin);
        $end = ++$begin;
        foreach ($children as $child) {
            $repositor = $em->getRepository('App\Entity\DataList');
            $repositor->postOrderTraversal($child, $begin , $end, $em);
            $begin = ++$end;
        }
        $tree->setRight($end);
    }

    public function getChildren($parent_id)
    {
        return $this->getEntityManager()
            ->getRepository('App\Entity\DataList')
            ->createQueryBuilder('dl')
            ->where('dl.parent = :parentId')
            ->andWhere('dl.parent != dl.id')
            ->setParameter('parentId', $parent_id)
            ->orderBy('dl.left', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
