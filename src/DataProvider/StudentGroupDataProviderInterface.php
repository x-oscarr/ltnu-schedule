<?php
namespace App\DataProvider;

use App\Entity\Faculty;
use App\Entity\StudentsGroup;

interface StudentGroupDataProviderInterface
{
    /**
     * @param int $id
     * @return StudentsGroup|null
     */
    public function getStudentGroupById(int $id): ?StudentsGroup;

    /**
     * @return array
     */
    public function getAllStudentsGroups(): array;

    /**
     * @param array $criterias
     * @return StudentsGroup|null
     */
    public function getStudentGroupBy(array $criterias): ?StudentsGroup;

    /**
     * @param array $criterias
     * @return array
     */
    public function getStudentsGroupsBy(array $criterias): array;

    public function getAllStudentsGroupsAsArray(): array;

    public function getStudentGroupsByFacultyAndText(Faculty $faculty, string $text=null): array;
}
