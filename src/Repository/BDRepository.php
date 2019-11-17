<?php

namespace App\Repository;

use App\Entity\BD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BD|null find($id, $lockMode = null, $lockVersion = null)
 * @method BD|null findOneBy(array $criteria, array $orderBy = null)
 * @method BD[]    findAll()
 * @method BD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BD::class);
    }

    // /**
    //  * @return BD[] Returns an array of BD objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BD
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}