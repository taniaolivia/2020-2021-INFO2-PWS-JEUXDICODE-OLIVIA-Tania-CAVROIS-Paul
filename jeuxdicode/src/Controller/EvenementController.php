<?php

namespace App\Controller;

use App\Domain\Query\ListeEvenementsHandler;
use App\Domain\Query\ListeEvenementsQuery;
use App\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;

class EvenementController extends AbstractController
{
    /**
     * @Route("/detailevt/{id}", name="detailevt")
     */
    public function detailevt(int $id)
    {
        //acces aux services Doctrine, puis Repository de l'objet Evenement :
        $repository = $this->getDoctrine()->getManager();

        //récupération de l'evenement passé en paramètre
        $EvenementChoisi = $repository->getRepository(Evenement::class)->find($id);
        //dd($EvenementChoisi);

        //récupération de toutes les sessions associé à cet evenement :
        $listeSessions = $EvenementChoisi->getSessions();

        //récupération de tous les participants associé à cet evenement :
        $listeParticipants = $EvenementChoisi->getMembres();

        return $this->render('evenement/detailevt.html.twig', [
            'evt' => $EvenementChoisi,
            'listeSessions' => $listeSessions,
            'listeParticipants' => $listeParticipants,
        ]);
    }

    /**
     * @Route("/detailevtpass/{id}", name="detailevtpass")
     */
    public function detailevtpass($id)
    {
        //acces aux services Doctrine, puis Repository de l'objet Evenement :
        $repository = $this->getDoctrine()->getManager();

        //récupération de l'evenement passé en paramètre
        $EvenementChoisi = $repository->getRepository(Evenement::class)->find($id);
        dd($EvenementChoisi);

        //récupération de toutes les sessions associé à cet evenement :
        $listeSessions = $EvenementChoisi->getSessions();

        return $this->render('evenement/detailevtpass.html.twig', [
            'id'=> $id,
            'EvenementChoisi' => $EvenementChoisi,
            'listeSessions' => $listeSessions,
        ]);
    }

    /**
     * @Route("/detailprop/{id}", name="detailprop")
     */
    public function detailprop($id)
    {
        return $this->render('evenement/detailprop.html.twig', [
            'id'=> $id,
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * @Route("/detailsession/{id}", name="detailsession")
     */
    public function detailsession($id)
    {
        //acces aux services Doctrine, puis Repository de l'objet Evenement :
        $repository = $this->getDoctrine()->getManager();

        //récupération de l'evenement passé en paramètre
        $listeSessions = $repository->getRepository(Evenement::class)->find($id);
        //dd($listeSessions);

        //récupération de toutes les sessions associé à cet evenement :
        $listeSessions->getSession();

        return $this->render('evenement/detailsession.html.twig', [
            'id'=> $id,
            'listeSessions' => $listeSessions,
        ]);
    }

    /**
     * @Route("/add/{id}", name="add")
     */
    public function add($id)
    {
        return $this->render('evenement/add.html.twig', [
            'id'=> $id,
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * @Route("/addprop/{id}", name="addprop")
     */
    public function addprop($id)
    {
        return $this->render('evenement/addprop.html.twig', [
            'id'=> $id,
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * @Route("/listevt2", name="listevt2")
     */
    public function listevt2()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Evenement');
        $evenements = $repository->myFindAll2020();
        return $this->render('evenement/listevt2.html.twig', [
            'controller_name' => 'EvenementController',
            'evenements' => $evenements,
        ]);
    }

    /**
     * @Route("/listevttitre", name="listevttitre")
     */
    public function listevttitre()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Evenement');
        $evenements = $repository->myFindTitreDQL('symfony');
        return $this->render('evenement/listevt.html.twig', [
            'controller_name' => 'EvenementController',
            'evenements' => $evenements,
        ]);
    }


    /**
     * @Route("/listevts", name="listevts")
     */
    public function listevts(ListeEvenementsHandler $handler)
    {
        $listeEvenements = $handler->handle(new ListeEvenementsQuery());
        return $this->render('evenement/listevts.html.twig', [
            'listeEvenements' => $listeEvenements,
        ]);
    }

}