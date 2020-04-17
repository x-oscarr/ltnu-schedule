<?php
namespace App\Admin\Controller;

use App\Admin\DataProvider\UserDataProviderInterface;
use App\Entity\Group;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    private $userDataProvider;

    public function __construct(UserDataProviderInterface $userDataProvider)
    {
        $this->userDataProvider = $userDataProvider;
    }

    public function index()
    {
        $users = $this->userDataProvider->getAllUsers();

        return $this->render('admin/user/index.html.twig', [
            'users' => $users
        ]);
    }

    public function new()
    {

    }

    public function edit(User $user)
    {

    }

    public function delete(User $user)
    {

    }
}
