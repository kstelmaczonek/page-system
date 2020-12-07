<?php

namespace App\Repository;

use App\Entity\PageArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PageArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageArticle[]    findAll()
 * @method PageArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageArticle::class);
    }

    // /**
    //  * @return PageArticle[] Returns an array of PageArticle objects
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
    public function findOneBySomeField($value): ?PageArticle
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
