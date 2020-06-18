<?php
namespace App\DataProvider;

use App\Entity\Lesson;
use App\Entity\Semester;
use App\Entity\StudentsGroup;

interface LessonDataProviderInterface
{
    /**
     * @param int $id
     * @return Lesson|null
     */
    public function getLessonById(int $id): ?Lesson;

    /**
     * @return array
     */
    public function getAllLessons(): array;

    /**
     * @param array $criterias
     * @return Lesson|null
     */
    public function getLessonBy(array $criterias): ?Lesson;

    /**
     * @param array $criterias
     * @return array
     */
    public function getLessonsBy(array $criterias): array;

    public function getAllLessonsAsArray(): array;

    public function getLessonsByGroupAndCurrentSemester(StudentsGroup $group, Semester $semester);
}
