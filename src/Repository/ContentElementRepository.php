<?php

namespace App\Repository;

use App\Entity\ContentElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentElement[]    findAll()
 * @method ContentElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentElement::class);
    }

    // /**
    //  * @return ContentElement[] Returns an array of ContentElement objects
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
    public function findOneBySomeField($value): ?ContentElement
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
