<?php

namespace App\Controller;

use App\Entity\User;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
         
        
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
      #[Route('/inscription_register', name:'app_inscription_register')]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher)
    {
        if ($request->isMethod('POST')) {
            $user = new User();
            $email = $request->request->get('email');
            $plainPassword = $request->request->get('password');

            $hashedPassword = $hasher->hashPassword($user, $plainPassword);
            $user->setEmail($email);
            $user->setPassword($hashedPassword);
            $user->setRoles(['ROLE_USER']);
            $user->setCredits(20); 
            $user->setCreatedAt(new \DateTimeImmutable());

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('inscription/index.html.twig');
    }
}
