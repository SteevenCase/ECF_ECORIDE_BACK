<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CovoiturageType;
use App\Form\VehiculeType;
use App\Entity\Covoiturage;
use App\Entity\Vehicule;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/compte', name: 'app_compte')]
final class CompteUtilisateurController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function compte(Request $request, EntityManagerInterface $em, Security $security): Response
    {
        $user = $security->getUser();

        // 1er formulaire : Covoiturage
        $covoiturage = new Covoiturage();
        $formCovoiturage = $this->createForm(CovoiturageType::class, $covoiturage);
        $formCovoiturage->handleRequest($request);

        
        // Gestion soumission formulaire Covoiturage
        if ($formCovoiturage->isSubmitted() && $formCovoiturage->isValid()) {
            $covoiturage->setOwner($user);
            $em->persist($covoiturage);
            $em->flush();
            
            $this->addFlash('success', 'Trajet créé avec succès !');
            return $this->redirectToRoute('app_compte_index');
        }
        
        // 2e formulaire : Véhicule
        $vehicule = new Vehicule();
        $formVehicule = $this->createForm(VehiculeType::class, $vehicule);
        $formVehicule->handleRequest($request);
        

        // Gestion soumission formulaire Véhicule
        if ($formVehicule->isSubmitted() &&            $formVehicule->isValid()) {

            $vehicule->setUsersFK($user);
            $vehicule->setCreatedAt(new \DateTimeImmutable());
            $em->persist($vehicule);
            $em->flush();

            $this->addFlash('success', 'Véhicule ajouté avec succès !');
            return $this->redirectToRoute('app_compte_index');
        }

        
        return $this->render('compte/index.html.twig', [
            'formCovoiturage' => $formCovoiturage->createView(),
            'formVehicule' => $formVehicule->createView(),
        ]);
    }
}
