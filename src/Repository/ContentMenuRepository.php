<?php

namespace App\Repository;

use App\Entity\ContentMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentMenu[]    findAll()
 * @method ContentMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentMenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentMenu::class);
    }

    // /**
    //  * @return ContentMenu[] Returns an array of ContentMenu objects
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
    public function findOneBySomeField($value): ?ContentMenu
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
