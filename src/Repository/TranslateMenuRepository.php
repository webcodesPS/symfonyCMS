<?php

namespace App\Repository;

use App\Entity\TranslateMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TranslateMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TranslateMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TranslateMenu[]    findAll()
 * @method TranslateMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranslateMenuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TranslateMenu::class);
    }

    // /**
    //  * @return TranslateMenu[] Returns an array of TranslateMenu objects
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
    public function findOneBySomeField($value): ?TranslateMenu
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
