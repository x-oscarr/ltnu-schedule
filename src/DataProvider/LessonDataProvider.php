<?php
namespace App\DataProvider;

use App\Entity\Faculty;
use App\Entity\Lesson;
use App\Entity\Semester;
use App\Entity\StudentsGroup;
use App\Repository\FacultyRepository;
use App\Repository\LessonRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class LessonDataProvider implements LessonDataProviderInterface
{
    /**
     * @var LessonRepository
     */
    private $lessonRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * FacultyDataProvider constructor.
     * @param LessonRepository $lessonRepository
     * @param LoggerInterface $logger
     */
    public function __construct(LessonRepository $lessonRepository, LoggerInterface $logger)
    {
        $this->lessonRepository = $lessonRepository;
        $this->logger = $logger;
    }

    public function getLessonById(int $id): ?Lesson
    {
        try {
            return $this->lessonRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllLessons(): array
    {
        try {
            return $this->lessonRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getLessonsBy(array $criterias): array
    {
        try {
            return $this->lessonRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getLessonBy(array $criterias): ?Lesson
    {
        try {
            return $this->lessonRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }

    public function getAllLessonsAsArray(): array
    {
        try {
            return $this->lessonRepository->getAllLessonsAsArray();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }

    public function getLessonsByGroupAndCurrentSemester(StudentsGroup $group, Semester $semester)
    {
        try {
            return $this->lessonRepository->getLessonsByGroupAndCurrentSemester($group, $semester);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage());
            return [];
        }
    }
}
