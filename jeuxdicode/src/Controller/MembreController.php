<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{
    /**
     * @Route("/listemembre", name="listemembre")
     */
    public function listemembre()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Membre');
        $membres = $repository->findAll();
        return $this->render('membre/listemembre.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membres,
        ]);
    }
}