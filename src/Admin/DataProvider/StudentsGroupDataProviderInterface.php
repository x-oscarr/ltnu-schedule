<?php
namespace App\Admin\DataProvider;

use App\Entity\StudentsGroup;

interface StudentsGroupDataProviderInterface
{
    /**
     * @param int $id
     * @return StudentsGroup|null
     */
    public function getGroupById(int $id): ?StudentsGroup;

    /**
     * @return array
     */
    public function getAllGroups(): array;

    /**
     * @param array $criterias
     * @return StudentsGroup|null
     */
    public function getGroupBy(array $criterias): ?StudentsGroup;

    /**
     * @param array $criterias
     * @return array
     */
    public function getGroupsBy(array $criterias): array;
}
