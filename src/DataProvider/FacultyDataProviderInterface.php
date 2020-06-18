<?php
namespace App\DataProvider;

use App\Entity\Faculty;

interface FacultyDataProviderInterface
{
    /**
     * @param int $id
     * @return Faculty|null
     */
    public function getFacultyById(int $id): ?Faculty;

    /**
     * @return array
     */
    public function getAllFaculties(): array;

    /**
     * @param array $criterias
     * @return Faculty|null
     */
    public function getFacultyBy(array $criterias): ?Faculty;

    /**
     * @param array $criterias
     * @return array
     */
    public function getFacultiesBy(array $criterias): array;

    public function getAllFacultiesAsArray(): array;
}
