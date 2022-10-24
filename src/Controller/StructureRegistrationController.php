<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StructureRegistrationController extends AbstractController
{
    #[Route('/structure/registration', name: 'app_structure_registration')]
    public function index(): Response
    {
        return $this->render('structure_registration/index.html.twig', [
            'controller_name' => 'StructureRegistrationController',
        ]);
    }
}
