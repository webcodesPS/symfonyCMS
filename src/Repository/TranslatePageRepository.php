<?php

namespace App\Repository;

use App\Entity\TranslatePage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TranslatePage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TranslatePage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TranslatePage[]    findAll()
 * @method TranslatePage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranslatePageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TranslatePage::class);
    }

    // /**
    //  * @return TranslatePage[] Returns an array of TranslatePage objects
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
    public function findOneBySomeField($value): ?TranslatePage
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
