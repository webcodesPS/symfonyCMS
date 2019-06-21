<?php

namespace App\Repository;

use App\Entity\TranslateMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TranslateMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method TranslateMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method TranslateMedia[]    findAll()
 * @method TranslateMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranslateMediaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TranslateMedia::class);
    }

    // /**
    //  * @return TranslateMedia[] Returns an array of TranslateMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TranslateMedia
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
