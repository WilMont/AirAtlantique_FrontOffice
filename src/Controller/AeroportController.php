<?php

namespace App\Controller;

use App\Entity\Aeroport;
use App\Form\CreerAeroportType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AeroportController extends AbstractController
{
    /**
     * @Route("/listeAeroports", name="listeAeroports")
     */
    public function listerAeroports()
    {
        $aeroportRepository = $this->getDoctrine()->getRepository(Aeroport::class);

        $lesAeroports = $aeroportRepository->findAll();

        return $this->render('aeroport/listeAeroports.html.twig', [
            'lesAeroports' => $lesAeroports,
        ]);
    }

}
