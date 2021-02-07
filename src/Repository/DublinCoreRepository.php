<?php

namespace App\Repository;

use App\Entity\DublinCore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DublinCore|null find($id, $lockMode = null, $lockVersion = null)
 * @method DublinCore|null findOneBy(array $criteria, array $orderBy = null)
 * @method DublinCore[]    findAll()
 * @method DublinCore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DublinCoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DublinCore::class);
    }

    // /**
    //  * @return DublinCore[] Returns an array of DublinCore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DublinCore
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
