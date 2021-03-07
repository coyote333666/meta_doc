<?php

namespace App\Repository;

use App\Entity\Classification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Classification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classification[]    findAll()
 * @method Classification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classification::class);
    }

    public function findAll()
    {
        return $this->findBy([], ['code' => 'ASC']);
    }

    // /**
    //  * @return Classification[] Returns an array of Classification objects
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
    public function findOneBySomeField($value): ?Classification
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.code = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */      
}
