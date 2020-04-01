<?php
namespace App\Admin\DataProvider;

use App\Entity\StudentsGroup;
use App\Repository\StudentsGroupRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class StudentsGroupDataProvider implements StudentsGroupDataProviderInterface
{
    /**
     * @var StudentsGroupRepository
     */
    private $studentsGroupRepository;

    /**
     * @var
     */
    private $logger;

    /**
     * StudentsGroupDataProvider constructor.
     * @param StudentsGroupRepository $studentsGroupRepository
     * @param LoggerInterface $logger
     */
    public function __construct(StudentsGroupRepository $studentsGroupRepository, LoggerInterface $logger)
    {
        $this->studentsGroupRepository = $studentsGroupRepository;
        $this->logger = $logger;
    }

    /**
     * @param int $id
     * @return StudentsGroup|null
     */
    public function getGroupById(int $id): ?StudentsGroup
    {
        try {
            return $this->studentsGroupRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    public function getAllGroups(): array
    {
        try {
            return $this->studentsGroupRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return [];
        }
    }

    public function getGroupBy(array $criterias): ?StudentsGroup
    {
        try {
            return $this->studentsGroupRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    public function getGroupsBy(array $criterias): array
    {
        try {
            return $this->studentsGroupRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }
}
