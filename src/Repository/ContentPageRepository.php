<?php

namespace App\Repository;

use App\Entity\ContentPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentPage[]    findAll()
 * @method ContentPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentPage::class);
    }
}
