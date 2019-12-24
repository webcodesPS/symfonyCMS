<?php

namespace App\Repository;

use App\Entity\ContentMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContentMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentMedia[]    findAll()
 * @method ContentMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentMediaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContentMedia::class);
    }
}
