<?php
namespace App\DataProvider;

use App\Entity\Lesson;

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
}
