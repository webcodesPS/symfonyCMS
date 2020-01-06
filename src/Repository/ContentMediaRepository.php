<?php

namespace App\Repository;

use App\Entity\ContentMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentMedia[]    findAll()
 * @method ContentMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentMedia::class);
    }
}
