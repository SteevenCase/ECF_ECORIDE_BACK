<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SecurityController extends AbstractController
{
    #[Route('/deconnexion', name: 'app_logout')]
     public function logout(): void
{
   
    throw new \LogicException('Gérée automatiquement par Symfony.');
}
}
