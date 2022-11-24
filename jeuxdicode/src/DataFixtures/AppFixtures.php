<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Membre;
use App\Entity\Session;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        //Les membres
        $membre1 = new Membre();
        $membre1->setNom('dupont');
        $membre1->setPrenom('paul');
        $membre1->setTel('06xxxxxxxx');
        $membre1->setAdressemail('dupontp@test.com');
        $manager->persist($membre1);

        $membre2 = new Membre();
        $membre2->setNom('durand');
        $membre2->setPrenom('pierre');
        $membre2->setTel('06xxxxxxxx');
        $membre2->setAdressemail('durandp@test.com');
        $manager->persist($membre2);


        //Les évènements
        $event1 = new Evenement();
        $event1->setTitre('intro symfony');
        $DateD = '10/12/2020';
        $DateF = '10/12/2020';
        $event1->setDateHeureDebut(new \DateTime($DateD));
        $event1->setDateHeureFin(new \DateTime($DateF));
        $event1->setNbpartmax(9);
        $event1->setAdresse('en ligne');
        $event1->setEvtcourant(false);

        $event1->addMembre($membre1);
        $event1->addMembre($membre2);
        $manager->persist($event1);

        $event2 = new Evenement();
        $event2->setTitre('intro docker');
        $DateD = '9/12/2020';
        $DateF = '9/12/2020';
        $event2->setDateHeureDebut(new \DateTime($DateD));
        $event2->setDateHeureFin(new \DateTime($DateF));
        $event2->setNbpartmax(9);
        $event2->setAdresse('en ligne');
        $event2->setEvtcourant(false);

        $event2->addMembre($membre1);
        $manager->persist($event2);

        $event3 = new Evenement();
        $event3->setTitre('intro docker1');
        $DateD = '8/12/2021';
        $DateF = '8/12/2021';
        $event3->setDateHeureDebut(new \DateTime($DateD));
        $event3->setDateHeureFin(new \DateTime($DateF));
        $event3->setNbpartmax(9);
        $event3->setAdresse('en ligne');
        $event3->setEvtcourant(false);

        $event3->addMembre($membre1);
        $event3->addMembre($membre2);
        $manager->persist($event3);

        $event4 = new Evenement();
        $event4->setTitre('intro.symfony.test');
        $DateD = '8/12/2021';
        $DateF = '8/12/2021';
        $event4->setDateHeureDebut(new \DateTime($DateD));
        $event4->setDateHeureFin(new \DateTime($DateF));
        $event4->setNbpartmax(9);
        $event4->setAdresse('en ligne');
        $event4->setEvtcourant(false);

        $event4->addMembre($membre2);
        $manager->persist($event4);

        //Les sessions
        $session1 = new Session();
        $session1->setTitre('intro symfony les bases');
        $session1->setDescription('CF');
        $session1->setEvenement($event1);
        $manager->persist($session1);

        $manager->flush();
    }
}
