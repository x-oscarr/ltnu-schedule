<?php
namespace App\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->render('admin/index/index.html.twig', []);
    }
}
