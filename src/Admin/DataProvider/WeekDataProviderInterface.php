<?php
namespace App\Admin\DataProvider;

use App\Entity\Week;

interface WeekDataProviderInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function getWeekById(int $id): ?Week;

    /**
     * @return array
     */
    public function getAllWeeks(): array;

    /**
     * @param array $criterias
     * @return Week|null
     */
    public function getWeekBy(array $criterias): ?Week;

    /**
     * @param array $criterias
     * @return array
     */
    public function getWeeksBy(array $criterias): array;
}
