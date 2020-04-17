<?php
namespace App\Admin\DataProvider;

use App\Entity\Lesson;
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
     * @var
     */
    private $logger;

    /**
     * LessonDataProvider constructor.
     * @param LessonRepository $lessonRepository
     * @param LoggerInterface $logger
     */
    public function __construct(LessonRepository $lessonRepository, LoggerInterface $logger)
    {
        $this->lessonRepository = $lessonRepository;
        $this->logger = $logger;
    }

    /**
     * @param int $id
     * @return Lesson|null
     */
    public function getLessonById(int $id): ?Lesson
    {
        try {
            return $this->lessonRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @return array
     */
    public function getAllLessons(): array
    {
        try {
            return $this->lessonRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return [];
        }
    }

    /**
     * @param array $criterias
     * @return Lesson|null
     */
    public function getLessonBy(array $criterias): ?Lesson
    {
        try {
            return $this->lessonRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @param array $criterias
     * @return array
     */
    public function getLessonsBy(array $criterias): array
    {
        try {
            return $this->lessonRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }
}
