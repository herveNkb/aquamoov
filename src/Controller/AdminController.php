<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\EditUserType;
use App\Repository\UsersRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// "admin" is a principal route, other methods will follow after the underscore
// ex: admin_index or admin_machin. . .
#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/administration', name: 'administration')]
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
            'users' => $users -> findBy([
                'code_function' => ''
            ])
        ]);
    }

    //    Edit user profile with "Modifier" button
    #[Route('/utilisateur.modifier/{id}', name: 'modifier_utilisateur')]
    public function editUser(Users $user, Request $request, ManagerRegistry $doctrine): Response
    {

        $form = $this -> createForm(EditUserType::class, $user);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()) {
            $entityManager = $doctrine -> getManager(); //new way to call entityManager into php 8
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Information(s) modifiée(s)');
            return $this->redirectToRoute('app_admin_utilisateurs');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' =>$form->createView()
        ]);
    }

    //    Switch for active status (on or off)
    #[Route('/activer/{id}', name: 'activer')]
    public function activation(Users $users, ManagerRegistry $doctrine) : Response
    {
        $users->setActive(($users->getActive()) ? false : true);
        $entityManager = $doctrine->getManager();  //new way to call entityManager into php 8
        $entityManager->persist($users);
        $entityManager->flush();

        return new Response("true");
    }

}


