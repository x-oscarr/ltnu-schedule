<?php
namespace App\Admin\Controller;

use App\Admin\DataProvider\StudentsGroupDataProviderInterface;
use App\Admin\Form\StudentsGroupType;
use App\Entity\StudentsGroup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class StudentsGroupController extends AbstractController
{
    private $studentsGroupDataProvider;

    public function __construct(StudentsGroupDataProviderInterface $studentsGroupDataProvider)
    {
        $this->studentsGroupDataProvider = $studentsGroupDataProvider;
    }

    public function index()
    {
        $groups = $this->studentsGroupDataProvider->getAllGroups();

        return $this->render('admin/group/index.html.twig', [
            'groups' => $groups
        ]);
    }

    public function new(Request $request)
    {
        $studentsGroup = new StudentsGroup();
        $form = $this->createForm(StudentsGroupType::class, $studentsGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentsGroup);
            $entityManager->flush();

            return $this->redirectToRoute('admin_group_index');
        }

        return $this->render('admin/group/new.html.twig', [
            'group' => $studentsGroup,
            'form' => $form->createView(),
        ]);
    }

    public function edit(StudentsGroup $studentsGroup, Request $request)
    {
        $form = $this->createForm(StudentsGroupType::class, $studentsGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentsGroup);
            $entityManager->flush();

            return $this->redirectToRoute('admin_group_index');
        }

        return $this->render('admin/group/edit.html.twig', [
            'group' => $studentsGroup,
            'form' => $form->createView(),
        ]);
    }

    public function delete(StudentsGroup $group)
    {

    }
}
