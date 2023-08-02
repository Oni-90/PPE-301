<?php

namespace App\Controller\Directeur;

use App\Entity\EmploiTemps;
use App\Entity\ClasseSearch;
use App\Form\EmploiTempsType;
use App\Form\ClasseSearchType;
use App\Repository\EmploiTempsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('directeur/emploi/temps',name:'directeur_emploi_temps_')]
class EmploiTempsController extends AbstractController
{
    #[Route('/', name: 'liste')]
    public function index(Request $request, EmploiTempsRepository $emploiTempsRepository): Response
    {
        $ClasseSearch = new ClasseSearch();
        $form = $this->createForm(ClasseSearchType::class, $ClasseSearch);
        $form->handleRequest($request);

        $articles = [];
        
        if ($form->isSubmitted() && $form->isValid()) {
            $Classe = $ClasseSearch->getClasse();
            if ($Classe != "") {
            
                $emploiTemps=$Classe->getEmploiTemps();
            } else {
            
                $emploiTemps = $emploiTempsRepository->findByAll();
            }

        }
        else {
             $emploiTemps =  $emploiTempsRepository->findAll();
            }


        return $this->render('directeur/emploi_temps/index.html.twig', [
            'emploi_temps' => $emploiTemps,
            'form' => $form->createView()
        ]);
    }

    #[Route('/ajouter', name: 'ajouter', methods: ['GET', 'POST'])]
    public function new(Request $request, EmploiTempsRepository $emploiTempsRepository): Response
    {
        $emploiTemp = new EmploiTemps();
        $form = $this->createForm(EmploiTempsType::class, $emploiTemp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emploiTempsRepository->save($emploiTemp, true);

            return $this->redirectToRoute('directeur_emploi_temps_liste', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('directeur/emploi_temps/new.html.twig', [
            'emploi_temp' => $emploiTemp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(EmploiTemps $emploiTemp): Response
    {
        return $this->render('directeur/emploi_temps/show.html.twig', [
            'emploi_temp' => $emploiTemp,
        ]);
    }

    #[Route('modifier/{id}t', name: 'modifier', methods: ['GET', 'POST'])]
    public function edit(Request $request, EmploiTemps $emploiTemp, EmploiTempsRepository $emploiTempsRepository): Response
    {
        $form = $this->createForm(EmploiTempsType::class, $emploiTemp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emploiTempsRepository->save($emploiTemp, true);

            return $this->redirectToRoute('directeur_emploi_temps_liste', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('directeur/emploi_temps/edit.html.twig', [
            'emploi_temp' => $emploiTemp,
            'form' => $form,
        ]);
    }

    #[Route('supprimer/{id}', name: 'supprimer', methods: ['POST'])]
    public function delete(Request $request, EmploiTemps $emploiTemp, EmploiTempsRepository $emploiTempsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$emploiTemp->getId(), $request->request->get('_token'))) {
            $emploiTempsRepository->remove($emploiTemp, true);
        }

        return $this->redirectToRoute('directeur_emploi_temps_liste', [], Response::HTTP_SEE_OTHER);
    }
}
