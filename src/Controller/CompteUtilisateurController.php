<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CompteUtilisateurController extends AbstractController
{
    #[Route('/compte_utilisateur', name: 'app_compte_utilisateur')]
    public function index(): Response
    {
        return $this->render('compte_utilisateur/index.html.twig', [
            'controller_name' => 'CompteUtilisateurController',
        ]);
    }
}
