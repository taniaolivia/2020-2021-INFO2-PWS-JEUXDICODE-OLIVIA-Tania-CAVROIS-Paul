<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;

class ListeEvenementsHandler
{
    private $agenda;

    public function __construct(AgendaDEvenements $agenda)
    {
        $this->agenda = $agenda;
    }

    public function handle(ListeEvenementsQuery $requete): iterable
    {
        return $this->agenda->tousLesEvenements();
    }
}