<?php
namespace App\DataProvider;

use App\Entity\Faculty;
use App\Repository\FacultyRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class FacultyDataProvider implements FacultyDataProviderInterface
{
    /**
     * @var FacultyRepository
     */
    private $facultyRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * FacultyDataProvider constructor.
     * @param FacultyRepository $facultyRepository
     * @param LoggerInterface $logger
     */
    public function __construct(FacultyRepository $facultyRepository, LoggerInterface $logger)
    {
        $this->facultyRepository = $facultyRepository;
        $this->logger = $logger;
    }

    public function getFacultyById(int $id): ?Faculty
    {
        try {
            return $this->facultyRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllFaculties(): array
    {
        try {
            return $this->facultyRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getFacultiesBy(array $criterias): array
    {
        try {
            return $this->facultyRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getFacultyBy(array $criterias): ?Faculty
    {
        try {
            return $this->facultyRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllFacultiesAsArray(): array
    {
        try {
            return $this->facultyRepository->getAllFacultiesAsArray();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }
}
