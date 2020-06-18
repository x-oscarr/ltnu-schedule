<?php
namespace App\Controller\Api;

use App\DataProvider\FacultyDataProviderInterface;
use App\DataProvider\StudentGroupDataProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class StudentGroupController extends AbstractController
{
    private $facultyDataProvider;

    private $studentGroupDataProvider;

    public function __construct(
        FacultyDataProviderInterface $facultyDataProvider,
        StudentGroupDataProviderInterface $studentGroupDataProvider
    )
    {
        $this->facultyDataProvider = $facultyDataProvider;
        $this->studentGroupDataProvider = $studentGroupDataProvider;
    }

    public function groups(Request $request)
    {
        $facultyId = $request->get('id');
        $faculty = $this->facultyDataProvider->getFacultyById($facultyId);
        $text = $request->get('value');
        $groups = $this->studentGroupDataProvider->getStudentGroupsByFacultyAndText($faculty, $text);
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
