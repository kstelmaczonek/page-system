<?php

namespace App\Repository;

use App\Entity\PageStatic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PageStatic|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageStatic|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageStatic[]    findAll()
 * @method PageStatic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageStaticRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageStatic::class);
    }

    // /**
    //  * @return PageStatic[] Returns an array of PageStatic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PageStatic
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
