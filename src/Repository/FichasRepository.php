<?php

namespace App\Repository;

use App\Entity\Fichas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichas[]    findAll()
 * @method Fichas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichas::class);
    }

    // /**
    //  * @return Fichas[] Returns an array of Fichas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichas
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
