<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Form\ModifierUtilisateurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/profil/{id_utilisateur}", name="profil")
     */
    public function affichageProfil($id_utilisateur)
    {
        //Récupération du repository Utilisateur.
        $utilisateurRepository=$this->getDoctrine()->getRepository(Utilisateur::class);

        $utilisateur = $utilisateurRepository->find($id_utilisateur);

        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    
}
