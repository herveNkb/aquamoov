<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminFranchiseController extends AbstractController
{
    #[Route('/franchise', name: 'app_admin_franchise')]
    public function index(): Response
    {
        return $this->render('admin_franchise/index.html.twig', [
            'controller_name' => 'AdminFranchiseController',
        ]);
    }
}
