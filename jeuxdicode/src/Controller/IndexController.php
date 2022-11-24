<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Membre;
use App\Entity\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $evt = new Evenement();
        $membre = new Membre();
        $session = new Session();
        $evt->setTitre('Présentation du framework symfony3');
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'evt' => $evt,
            'membre' => $membre,
            'session' => $session,
        ]);
    }
}
