<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CompteAdminController extends AbstractController
{
    #[Route('/compteAdmin', name: 'app_compte_admin')]
    public function index(): Response
    {
        return $this->render('compteAdmin/index.html.twig', [
            'controller_name' => 'CompteAdminController',
        ]);
    }
}
