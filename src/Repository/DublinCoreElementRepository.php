<?php

namespace App\Repository;

use App\Entity\DublinCoreElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DublinCoreElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method DublinCoreElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method DublinCoreElement[]    findAll()
 * @method DublinCoreElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DublinCoreElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DublinCoreElement::class);
    }

    // /**
    //  * @return DublinCoreElement[] Returns an array of DublinCoreElement objects
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
    public function findOneBySomeField($value): ?DublinCoreElement
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
