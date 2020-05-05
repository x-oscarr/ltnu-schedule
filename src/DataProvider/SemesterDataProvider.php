<?php
namespace App\DataProvider;

use App\Entity\Semester;
use App\Repository\SemesterRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class SemesterDataProvider implements SemesterDataProviderInterface
{
    /**
     * @var SemesterRepository
     */
    private $semesterRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SemesterDataProvider constructor.
     * @param SemesterRepository $semesterRepository
     * @param LoggerInterface $logger
     */
    public function __construct(SemesterRepository $semesterRepository, LoggerInterface $logger)
    {
        $this->semesterRepository = $semesterRepository;
        $this->logger = $logger;
    }

    public function getSemesterById(int $id): ?Semester
    {
        try {
            return $this->semesterRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllSemesters(): array
    {
        try {
            return $this->semesterRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getSemestersBy(array $criterias): array
    {
        try {
            return $this->semesterRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getSemesterBy(array $criterias): ?Semester
    {
        try {
            return $this->semesterRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

//    public function getAllSemestersAsArray(): array
//    {
//        try {
//            return $this->semesterRepository->getAllSemestersAsArray();
//        } catch (ORMException | ORMInvalidArgumentException $e) {
//            $this->logger->error($e->getMessage());
//            return [];
//        }
//    }

    public function getCurrentSemester(): ?Semester
    {
        try {
            return $this->semesterRepository->getCurrentSemester();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }
}
