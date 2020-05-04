<?php
namespace App\DataProvider;

use App\Entity\Faculty;
use App\Entity\StudentsGroup;
use App\Repository\FacultyRepository;
use App\Repository\StudentsGroupRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class StudentGroupDataProvider implements StudentGroupDataProviderInterface
{
    /**
     * @var StudentsGroupRepository
     */
    private $studentsGroupRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * StudentGroupDataProvider constructor.
     * @param StudentsGroupRepository $studentsGroupRepository
     * @param LoggerInterface $logger
     */
    public function __construct(StudentsGroupRepository $studentsGroupRepository, LoggerInterface $logger)
    {
        $this->studentsGroupRepository = $studentsGroupRepository;
        $this->logger = $logger;
    }

    public function getStudentGroupById(int $id): ?StudentsGroup
    {
        try {
            return $this->studentsGroupRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllStudentsGroups(): array
    {
        try {
            return $this->studentsGroupRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getStudentsGroupsBy(array $criterias): array
    {
        try {
            return $this->studentsGroupRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getStudentGroupBy(array $criterias): ?StudentsGroup
    {
        try {
            return $this->studentsGroupRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllStudentsGroupsAsArray(): array
    {
        try {
            return $this->studentsGroupRepository->getAllFacultiesAsArray();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getStudentGroupsByFacultyAndText(Faculty $faculty, string $text=null): array
    {
        try {
            return $this->studentsGroupRepository->getStudentGroupsByFacultyAndText($faculty, $text);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }
}
