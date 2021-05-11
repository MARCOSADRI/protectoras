<?php

namespace App\Repository;

use App\Entity\Animales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Animales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animales[]    findAll()
 * @method Animales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animales::class);
    }

    /**
    * @return Animales[] Returns an array of Animales objects
    */
/*Lista Todos los Animales SIN ADOPTAR */  
    public function findByDisponible()
    {
        return $this->createQueryBuilder('a')
        ->andWhere('a.adoptador IS NULL')
        ->orderBy('a.id', 'ASC')
        ->getQuery()
        ->getResult()
    ; 
    }
    

    /*
    public function findOneBySomeField($value): ?Animales
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
