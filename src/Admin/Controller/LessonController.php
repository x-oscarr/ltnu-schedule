<?php
namespace App\Admin\Controller;

use App\Admin\DataProvider\LessonDataProviderInterface;
use App\Entity\Lesson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LessonController extends AbstractController
{
    private $lessonDataProvider;

    public function __construct(LessonDataProviderInterface $lessonDataProvider)
    {
        $this->lessonDataProvider = $lessonDataProvider;
    }

    public function index()
    {
        $lessons = $this->lessonDataProvider->getAllLessons();

        return $this->render('admin/lesson/index.html.twig', [
            'lessons' => $lessons
        ]);
    }

    public function new()
    {

    }

    public function edit(Lesson $lesson)
    {

    }

    public function delete(Lesson $lesson)
    {

    }
}
