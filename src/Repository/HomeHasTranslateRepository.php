<?php

namespace App\Repository;

use App\Entity\HomeHasTranslate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HomeHasTranslate|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeHasTranslate|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeHasTranslate[]    findAll()
 * @method HomeHasTranslate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeHasTranslateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HomeHasTranslate::class);
    }

    // /**
    //  * @return HomeHasTranslate[] Returns an array of HomeHasTranslate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HomeHasTranslate
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
