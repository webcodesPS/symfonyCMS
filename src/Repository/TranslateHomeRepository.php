<?php

namespace App\Repository;

use App\Entity\TranslateHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TranslateHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method TranslateHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method TranslateHome[]    findAll()
 * @method TranslateHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranslateHomeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TranslateHome::class);
    }

}
