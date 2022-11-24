<?php
namespace App\Domain;

use App\Entity\Evenement;

interface AgendaDEvenements
{
    public function tousLesEvenements():iterable;
    public function getUnEvenementParId($idEvenement):Evenement;
    public function tousLesParticipants($idEvenement): Evenement;
}