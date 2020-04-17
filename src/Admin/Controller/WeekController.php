<?php
namespace App\Admin\Controller;

use App\Admin\DataProvider\WeekDataProviderInterface;
use App\Entity\Week;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeekController extends AbstractController
{
    private $weekDataProvider;

    public function __construct(WeekDataProviderInterface $weekDataProvider)
    {
        $this->weekDataProvider = $weekDataProvider;
    }

    public function index()
    {
        $weeks = $this->weekDataProvider->getAllWeeks();

        return $this->render('admin/week/index.html.twig', [
            'weeks' => $weeks
        ]);
    }

    public function new()
    {

    }

    public function edit(Week $week)
    {

    }

    public function delete(Week $week)
    {

    }
}
