<?php

namespace App\Repository;

use App\Entity\Razas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Razas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Razas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Razas[]    findAll()
 * @method Razas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RazasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Razas::class);
    }

    // /**
    //  * @return Razas[] Returns an array of Razas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Razas
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
