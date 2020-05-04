<?php
namespace App\Controller\Api;

use App\DataProvider\FacultyDataProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FacultyController extends AbstractController
{
    private $facultyDataProvider;

    public function __construct(FacultyDataProviderInterface $facultyDataProvider)
    {
        $this->facultyDataProvider = $facultyDataProvider;
    }

    public function faculties()
    {
        $faculties = $this->facultyDataProvider->getAllFacultiesAsArray();
        if(empty($groups)) {
            $response = [
                'success' => false,
                'message' => 'Дані відсутні'
            ];
            return new JsonResponse($response);
        }
        return new JsonResponse($faculties);
    }
}
