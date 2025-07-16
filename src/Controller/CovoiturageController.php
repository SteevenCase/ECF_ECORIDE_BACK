<?php

namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'app_covoiturage')]
    public function index(): Response
    {
        return $this->render('covoiturage/index.html.twig', [
            'controller_name' => 'CovoiturageController',
        ]);
    }

    #[Route('/recherche-covoiturage', name: 'recherche_covoiturage', methods: ['POST'])]
    public function Show(Request $request, CovoiturageRepository $repo): Response
    {
        $lieuDepart = $request->request->get(key: 'lieuDepart');
        $lieuArrivee = $request->request->get(key: 'lieuArrivee');
        $date = $request->request->get(key: 'dateDepart');

        $resultats = $repo->findBy(criteria: [
            'lieuDepart' => $lieuDepart,
            'lieuArrivee' => $lieuArrivee,
            'dateDepart' => $date
        ]);

        return $this->render(view: 'covoiturage/index.html.twig',
        parameters: [
            'resultats' => $resultats,
        ]);

    }
}
