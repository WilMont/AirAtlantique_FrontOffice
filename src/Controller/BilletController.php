<?php

namespace App\Controller;

use App\Entity\Vol;
use App\Entity\Billet;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ConfirmationSuppressionBilletType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BilletController extends AbstractController
{
    /**
     * @Route("/listeBillets", name="listeBillets")
     */
    public function listerBillets()
    {
        $billetRepository = $this->getDoctrine()->getRepository(Billet::class);

        $lesBillets = $billetRepository->findAll();

        return $this->render('billet/listeBillets.html.twig', [
            'lesBillets' => $lesBillets,
        ]);
    }

    /**
     * @Route("/billet/ajouter/{idUtilisateur}--{idVol}--{prix}", name="ajouter_billet")
     */
    public function ajouter(Request $request, $idUtilisateur, $idVol, $prix)
    {
        $utilisateurRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
        $volRepository = $this->getDoctrine()->getRepository(Vol::class);

        $utilisateur = $utilisateurRepository->find($idUtilisateur);
        $vol = $volRepository->find($idVol);

        $prixBillet = $volRepository->find($prix);
        $prixBillet = $prix;
        
        $billet = new Billet();
        $billet->setUtilisateur($utilisateur);
        $billet->setVol($vol);
        $billet->setPrix($prixBillet);

        //une connexion à la BDD par l'entity manager
        $em = $this->getDoctrine()->getManager();
        $em->persist($billet);
        $em->flush();

            return $this->redirectToRoute("listeBillets");
    }

    /**
     * @Route("billet/supprimer/{idBillet}", name="supprimer_billet")
     */
    public function supprimer($idBillet, Request $request){
        $billetRepository = $this->getDoctrine()->getRepository(Billet::class);
        $billet = $billetRepository->Find($idBillet);
    
        $form = $this->createForm(ConfirmationSuppressionBilletType::class, $billet);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $billet=$form->getData();

            //une connexion à la BDD par l'entity manager
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->query("DELETE FROM billet WHERE id = $idBillet");
            $statement->execute();

            return $this->redirectToRoute("listeBillets");
        }

        return $this->render('billet/suppression.html.twig', [
            "form"=>$form->createView(),
            "billet" => $billet,
            "titre" => "Suppression du billet n°" . $idBillet
        ]);
    }
}