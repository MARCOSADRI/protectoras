<?php

namespace App\Repository;

use App\Entity\Tamanos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tamanos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tamanos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tamanos[]    findAll()
 * @method Tamanos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TamanosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tamanos::class);
    }

    // /**
    //  * @return Tamanos[] Returns an array of Tamanos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tamanos
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
