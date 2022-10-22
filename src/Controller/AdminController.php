<?php

namespace App\Controller;


use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// "admin" is a principal route, other methods will follow after the underscore
// ex: admin_index or admin_machin. . .
#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this -> render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    //    List of users registered
    #[Route('/utilisateurs', name: 'utilisateurs')]
    //injection de dépendance
    public function userList(UsersRepository $users): Response
    {
        return $this -> render("admin/users.html.twig", [
            // display users directly
            'users' => $users -> findAll()
        ]);
    }


}


