<?php
namespace App\DataProvider;

use App\Entity\Semester;

interface SemesterDataProviderInterface
{
    /**
     * @param int $id
     * @return Semester|null
     */
    public function getSemesterById(int $id): ?Semester;

    /**
     * @return array
     */
    public function getAllSemesters(): array;

    /**
     * @param array $criterias
     * @return Semester|null
     */
    public function getSemesterBy(array $criterias): ?Semester;

    /**
     * @param array $criterias
     * @return array
     */
    public function getSemestersBy(array $criterias): array;

    public function getCurrentSemester(): ?Semester;
}
