<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminStructureController extends AbstractController
{
    #[Route('/structure', name: 'app_admin_structure')]
    public function index(): Response
    {
        return $this->render('admin_structure/index.html.twig', [
            'controller_name' => 'AdminStructureController',
        ]);
    }
}
