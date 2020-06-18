<?php
namespace App\Controller\Api;

use App\DataProvider\FacultyDataProviderInterface;
use App\DataProvider\LessonDataProviderInterface;
use App\DataProvider\SemesterDataProviderInterface;
use App\DataProvider\StudentGroupDataProviderInterface;
use App\Helper\ScheduleHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ScheduleController extends AbstractController
{
    private $facultyDataProvider;

    private $studentGroupDataProvider;

    private $lessonDataProvider;

    private $semesterDataProvider;

    public function __construct(
        FacultyDataProviderInterface $facultyDataProvider,
        StudentGroupDataProviderInterface $studentGroupDataProvider,
        LessonDataProviderInterface $lessonDataProvider,
        SemesterDataProviderInterface $semesterDataProvider
    )
    {
        $this->facultyDataProvider = $facultyDataProvider;
        $this->studentGroupDataProvider = $studentGroupDataProvider;
        $this->lessonDataProvider = $lessonDataProvider;
        $this->semesterDataProvider = $semesterDataProvider;
    }

    public function schedule(Request $request, ScheduleHelper $scheduleHelper)
    {
        $groupId = $request->get('groupId');
        $group = $this->studentGroupDataProvider->getStudentGroupById($groupId);
        $semester = $this->semesterDataProvider->getCurrentSemester();
        $lessons = $this->lessonDataProvider->getLessonsByGroupAndCurrentSemester($group, $semester);
        $schedule = $scheduleHelper->generateScheduleArray($lessons);
        if(empty($schedule)) {
            $response = [
                'success' => false,
                'message' => 'Розклад відсутній'
            ];
            return new JsonResponse($response);
        }
        return new JsonResponse($schedule);
    }
}
