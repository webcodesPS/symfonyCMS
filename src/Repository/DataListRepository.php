<?php

namespace App\Repository;

use App\Entity\DataList;
use App\Utils\SortableTree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class DataListRepository extends ServiceEntityRepository
{
    protected $sortableTree;

    public function __construct(RegistryInterface $registry, SortableTree $sortableTree)
    {
        $this->sortableTree = $sortableTree;

        parent::__construct($registry, DataList::class);
    }

    public function moveUp($area)
    {
        $this->sortableTree->sortUp('App\Entity\DataList', $area);
    }

    public function moveDown($area)
    {
        $this->sortableTree->sortDown('App\Entity\DataList', $area);
    }
}
