<?php

namespace App\Repository;

use App\Entity\Faculty;
use App\Entity\StudentsGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StudentsGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentsGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentsGroup[]    findAll()
 * @method StudentsGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentsGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentsGroup::class);
    }

    // /**
    //  * @return Group[] Returns an array of Group objects
    //  */
    public function getAllStudentsGroupsAsArray()
    {
        return $this->createQueryBuilder('sg')
            ->getQuery()
            ->getArrayResult()
            ;
    }

    public function getStudentsGroupsByFacultyAsArray(Faculty $faculty)
    {
        return $this->createQueryBuilder('sg')
            ->andWhere('sg.faculty = :faculty')
            ->setParameter('faculty', $faculty)
            ->getQuery()
            ->getArrayResult()
            ;
    }

    public function getStudentGroupsByFacultyAndText(Faculty $faculty, string $text=null)
    {
        return $this->createQueryBuilder('sg')
            ->select('sg.id')
            ->addSelect('sg.name as name')
            ->andWhere('sg.faculty = :faculty')
            ->andWhere('sg.name LIKE :text')
            ->setParameter('text', '%' . trim($text) . '%')
            ->setParameter('faculty', $faculty)
            ->getQuery()
            ->getArrayResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Group
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
