<?php

namespace App\Repository;

use App\Entity\Menu;
use App\Utils\SortableTree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class MenuRepository extends ServiceEntityRepository
{
    protected $sortableTree;

    public function __construct(RegistryInterface $registry, SortableTree $sortableTree)
    {
        $this->sortableTree = $sortableTree;

        parent::__construct($registry, Menu::class);
    }

    /**
     * @param $locale
     * @return Menu[]
     */
    public function findMenu($locale): array
    {
        return $this->createQueryBuilder('m')
            ->select('m', 'p', 't')
            ->leftJoin('m.page', 'p')
            ->leftJoin('m.contents', 't')
            ->andWhere('t.locale = :locale')
            ->setParameter('locale', $locale)
            ->getQuery()
            ->getArrayResult();
    }

    public function moveUp($area)
    {
        $this->sortableTree->sortUp('App\Entity\Menu', $area);
    }

    public function moveDown($area)
    {
        $this->sortableTree->sortDown('App\Entity\Menu', $area);
    }
}
