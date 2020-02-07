<?php

namespace App\Repository;

use App\Entity\ContentCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentCollection[]    findAll()
 * @method ContentCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentCollection::class);
    }

    // /**
    //  * @return ContentCollection[] Returns an array of ContentCollection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContentCollection
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
