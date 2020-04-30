<?php

namespace App\Repository;

use App\Entity\Faculity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Faculity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Faculity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Faculity[]    findAll()
 * @method Faculity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaculityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Faculity::class);
    }

    // /**
    //  * @return Faculity[] Returns an array of Faculity objects
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
    public function findOneBySomeField($value): ?Faculity
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
