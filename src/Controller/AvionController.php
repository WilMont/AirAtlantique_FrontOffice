<?php

namespace App\Controller;

use App\Entity\Avion;
use App\Form\CreerAvionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvionController extends AbstractController
{
    /**
     * @Route("/listeAvions", name="listeAvions")
     */
    public function listerAvions()
    {
        $avionRepository = $this->getDoctrine()->getRepository(Avion::class);

        $lesAvions = $avionRepository->findAll();

        return $this->render('avion/listeAvions.html.twig', [
            'lesAvions' => $lesAvions,
        ]);
    }

}
