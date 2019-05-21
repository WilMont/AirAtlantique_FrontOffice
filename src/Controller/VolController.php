<?php

namespace App\Controller;

use App\Entity\Vol;
use App\Form\CreerVolType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VolController extends AbstractController
{
    /**
     * @Route("/listeVols", name="listeVols")
     */
    public function listerVols()
    {
        $volRepository = $this->getDoctrine()->getRepository(Vol::class);


        $lesVols = $volRepository->findBy(array(), array('DepartTheorique' => 'asc'));


        return $this->render('vol/listeVols.html.twig', [
            'lesVols' => $lesVols,


        ]);
    }

}
