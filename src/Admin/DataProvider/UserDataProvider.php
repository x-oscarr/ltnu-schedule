<?php
namespace App\Admin\DataProvider;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class UserDataProvider implements UserDataProviderInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var
     */
    private $logger;

    /**
     * UserDataProvider constructor.
     * @param UserRepository $lessonRepository
     * @param LoggerInterface $logger
     */
    public function __construct(UserRepository $lessonRepository, LoggerInterface $logger)
    {
        $this->userRepository = $lessonRepository;
        $this->logger = $logger;
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): ?User
    {
        try {
            return $this->userRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        try {
            return $this->userRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return [];
        }
    }

    /**
     * @param array $criterias
     * @return User|null
     */
    public function getUserBy(array $criterias): ?User
    {
        try {
            return $this->userRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @param array $criterias
     * @return array
     */
    public function getUsersBy(array $criterias): array
    {
        try {
            return $this->userRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }
}
