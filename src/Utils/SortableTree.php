<?php

namespace App\Utils;

use Doctrine\ORM\EntityManagerInterface;

class SortableTree
{
    /**
     * @var EntityManagerInterface
     */
    private $_em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->_em = $entityManager;
    }

    public function sortUp($entity, $area) {
        $em = $this->_em;
        $repositor = $em->getRepository($entity);
        $area_upper = $repositor->findOneBy(['right'=>($area->getLeft()-1)]);
        if ($area_upper) {
            $del_1 = $area->getRight() - $area->getLeft();
            $del_2 = $area_upper->getRight() - $area_upper->getLeft();

            $area->setLeft($area_upper->getLeft());
            $area->setRight($area->getLeft() + $del_1);
            $area_upper->setLeft($area->getRight()+1);
            $area_upper->setRight($area_upper->getLeft() + $del_2);

            $end = 0;
            $this->postOrderTraversal($entity, $area_upper, $area_upper->getLeft() , $end, $em);
            $this->postOrderTraversal($entity, $area, $area->getLeft() , $end, $em);

            $em->persist($area);
            $em->persist($area_upper);
            $em->flush();
        }
    }

    public function sortDown($entity, $area) {
        $em = $this->_em;
        $repositor = $em->getRepository($entity);
        $area_under = $repositor->findOneBy(['left'=>($area->getRight()+1)]);
        if ($area_under) {
            $del_1 = $area->getRight() - $area->getLeft();
            $del_2 = $area_under->getRight() - $area_under->getLeft();

            $area_under->setLeft($area->getLeft());
            $area_under->setRight($area->getLeft() + $del_2);
            $area->setLeft($area_under->getRight() + 1);
            $area->setRight($area->getLeft() + $del_1);

            $end = 0;
            $this->postOrderTraversal($entity, $area_under, $area_under->getLeft() , $end, $em);
            $this->postOrderTraversal($entity, $area, $area->getLeft() , $end, $em);

            $em->persist($area);
            $em->persist($area_under);
            $em->flush();
        }
    }

    public function postOrderTraversal($entity, $tree, $begin, &$end, $em)
    {
        $children = $em->getRepository($entity)
            ->createQueryBuilder('dl')
            ->where('dl.parent = :parentId')
            ->andWhere('dl.parent != dl.id')
            ->setParameter('parentId', $tree->getId())
            ->orderBy('dl.left', 'ASC')
            ->getQuery()
            ->getResult();

        $tree->setLeft($begin);
        $end = ++$begin;
        foreach ($children as $child) {
            $this->postOrderTraversal($entity, $child, $begin , $end, $em);
            $begin = ++$end;
        }
        $tree->setRight($end);
    }
}
