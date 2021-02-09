<?php

namespace App\Repository;

use App\Entity\DocumentDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentDocument[]    findAll()
 * @method DocumentDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentDocument::class);
    }

    // /**
    //  * @return DocumentDocument[] Returns an array of DocumentDocument objects
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
    public function findOneBySomeField($value): ?DocumentDocument
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
