<?php

namespace App\Repository;

use App\Entity\DocumentRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentRelation[]    findAll()
 * @method DocumentRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentRelation::class);
    }

    // /**
    //  * @return DocumentRelation[] Returns an array of DocumentRelation objects
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
    public function findOneBySomeField($value): ?DocumentRelation
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
