<?php
namespace App\Admin\DataProvider;

use App\Entity\Week;
use App\Repository\WeekRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;

class WeekDataProvider implements WeekDataProviderInterface
{
    /**
     * @var WeekRepository
     */
    private $weekRepository;

    /**
     * @var
     */
    private $logger;

    /**
     * WeekDataProvider constructor.
     * @param WeekRepository $weekRepository
     * @param LoggerInterface $logger
     */
    public function __construct(WeekRepository $weekRepository, LoggerInterface $logger)
    {
        $this->weekRepository = $weekRepository;
        $this->logger = $logger;
    }

    /**
     * @param int $id
     * @return Week|null
     */
    public function getWeekById(int $id): ?Week
    {
        try {
            return $this->weekRepository->find($id);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @return array
     */
    public function getAllWeeks(): array
    {
        try {
            return $this->weekRepository->findAll();
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return [];
        }
    }

    /**
     * @param array $criterias
     * @return Week|null
     */
    public function getWeekBy(array $criterias): ?Week
    {
        try {
            return $this->weekRepository->findOneBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }

    /**
     * @param array $criterias
     * @return array
     */
    public function getWeeksBy(array $criterias): array
    {
        try {
            return $this->weekRepository->findBy($criterias);
        } catch (ORMException | ORMInvalidArgumentException $e) {
            $this->logger->error($e->getMessage(),['location'=> 'ADMIN']);
            return null;
        }
    }
}
