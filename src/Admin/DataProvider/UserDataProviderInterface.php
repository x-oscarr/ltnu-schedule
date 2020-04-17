<?php
namespace App\Admin\DataProvider;

use App\Entity\User;

interface UserDataProviderInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): ?User;

    /**
     * @return array
     */
    public function getAllUsers(): array;

    /**
     * @param array $criterias
     * @return User|null
     */
    public function getUserBy(array $criterias): ?User;

    /**
     * @param array $criterias
     * @return array
     */
    public function getUsersBy(array $criterias): array;
}
