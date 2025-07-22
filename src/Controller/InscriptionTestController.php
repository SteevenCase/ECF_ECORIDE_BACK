<?php

namespace App\Controller;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionTestController extends AbstractController
{
    
    #[Route('/inscriptionTest', name: 'app_inscription')]
public function inscription(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher,Security $security): Response
{
    
    $user = new User();
    $form = $this->createForm(InscriptionType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $currentCredits = $user->getCredits();
        $user->setCredits($currentCredits + 20);

        $user->setRoles(['ROLE_USER']);
        
         $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $user->getPassword()
        );
        $user->setPassword($hashedPassword);

        $user->setCreatedAt(new \DateTimeImmutable());

        $em->persist($user);
        $em->flush();
        $security->login($user, 'security.authenticator.form_login.main');

       

        return $this->redirectToRoute('app_home');
    }

    return $this->render('inscriptionTest/index.html.twig', [
        'form' => $form->createView(),
    ]);
}


}

