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

    public function findByExampleField($value)
    {
        $query = $this->createQueryBuilder('th')
            ->select('th.locale')
            ->where('th.home = 1');
        $array1 = $query->getQuery()->getArrayResult();
        $array2 = TranslateHome::getLocaleList();
//        print_r($array1[]);
//        print_r($array2);
//        echo $output = array_merge(array_diff($array1, $array2), array_diff($array2, $array1));

        return [];
    }

    // /**
    //  * @return TranslateHome[] Returns an array of TranslateHome objects
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
    public function findOneBySomeField($value): ?TranslateHome
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
