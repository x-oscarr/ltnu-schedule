<?php

namespace App\Repository;

use App\Entity\Lesson;
use App\Entity\Semester;
use App\Entity\StudentsGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lesson[]    findAll()
 * @method Lesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lesson::class);
    }

    // /**
    //  * @return Lesson[] Returns an array of Lesson objects
    //  */

    public function getLessonsByGroupAndCurrentSemester(StudentsGroup $group, Semester $semester)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.studentGroup = :group')
            ->andWhere('l.semester = :semester')
            ->setParameter('group', $group)
            ->setParameter('semester', $semester)
            ->orderBy('l.number', 'ASC')
            ->orderBy('l.dayOfWeek', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getLessonsByGroupByCurrentSemesterByDayOfWeek(StudentsGroup $group, Semester $semester, int $dayOfWeek)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.studentGroup = :group')
            ->andWhere('l.semester = :semester')
            ->andWhere('l.dayOfWeek = :day')
            ->setParameter('group', $group)
            ->setParameter('semester', $semester)
            ->setParameter('day', $dayOfWeek)
            ->orderBy('l.number', 'ASC')
            ->orderBy('l.dayOfWeek', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Lesson
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
