<?php
namespace App\Controller\Api;

use App\DataProvider\FacultyDataProviderInterface;
use App\DataProvider\LessonDataProviderInterface;
use App\DataProvider\StudentGroupDataProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ScheduleController extends AbstractController
{
    private $facultyDataProvider;

    private $studentGroupDataProvider;

    private $lessonDataProvider;

    public function __construct(
        FacultyDataProviderInterface $facultyDataProvider,
        StudentGroupDataProviderInterface $studentGroupDataProvider,
        LessonDataProviderInterface $lessonDataProvider
    )
    {
        $this->facultyDataProvider = $facultyDataProvider;
        $this->studentGroupDataProvider = $studentGroupDataProvider;
        $this->lessonDataProvider = $lessonDataProvider;
    }

    public function schedule(Request $request)
    {
        $groupId = $request->get('groupId');
        $group = $this->studentGroupDataProvider->getStudentGroupById($groupId);
        $lessons = $this->lessonDataProvider->getAllLessons();
        dd($lessons);
//        $schedule = $this->studentGroupDataProvider->getStudentGroupsByFacultyAndText($faculty, $text);
        if(empty($groups)) {
            $response = [
                'success' => false,
                'message' => 'За заданими параметрами не знайдено груп'
            ];
            return new JsonResponse($response);
        }
        return new JsonResponse($groups);
    }
}
