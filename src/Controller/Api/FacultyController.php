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

    public function faculties(Request $request)
    {
        $faculties = $this->facultyDataProvider->getAllFacultiesAsArray();
        return new JsonResponse($faculties);
    }
}
