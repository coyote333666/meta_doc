<?php

namespace App\Repository;

use App\Entity\DublinCoreRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DublinCoreRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DublinCoreRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DublinCoreRelation[]    findAll()
 * @method DublinCoreRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DublinCoreRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DublinCoreRelation::class);
    }

    // /**
    //  * @return DublinCoreRelation[] Returns an array of DublinCoreRelation objects
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
    public function findOneBySomeField($value): ?DublinCoreRelation
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
