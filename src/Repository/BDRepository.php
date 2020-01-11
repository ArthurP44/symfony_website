<?php

namespace App\Repository;

use App\Entity\BD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BD|null find($id, $lockMode = null, $lockVersion = null)
 * @method BD|null findOneBy(array $criteria, array $orderBy = null)
 * @method BD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BD::class);
    }

    public function findBD() {
        $query = $this->createQueryBuilder('bd')
            ->select('bd')
            ->orderBy('bd.created_at', 'DESC');
        return $query->getQuery()->getResult();
    }

    public function countBD() {
        $query = $this->createQueryBuilder('bd')
            ->select('bd');
        return $query->getQuery()->getResult();
    }

    public function countBdGenre() {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.genre')
            ->distinct('bd.genre');
        return $query->getQuery()->getResult();
    }

    public function countBdOnLoan() {
        $query = $this->createQueryBuilder('bd')
            ->select('bd')
            ->where('bd.on_loan = true');
        return $query->getQuery()->getResult();
    }

    public function countAuthor() {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.author')
            ->distinct('bd.author');
        return $query->getQuery()->getResult();
    }

    public function findByDate(): array
    {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.title', 'bd.created_at', 'bd.id')
            ->setMaxResults(5)
            ->orderBy('bd.created_at', 'DESC');
        return $query->getQuery()->getResult();
    }

    public function findByGenre(): array
    {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.genre')
            ->distinct('bd.genre')
            ->orderBy('bd.genre', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findByAuthor(): array
    {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.author')
            ->distinct('bd.author')
            ->orderBy('bd.author', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function isBorrowed(): array
    {
        $query = $this->createQueryBuilder('bd')
            ->select('bd.title','bd.comment', 'bd.id', 'bd.filename')
            ->where('bd.on_loan = true')
            ->orderBy('bd.title', 'desc');
        return $query->getQuery()->getResult();
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
