<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;

class ListeParticipantsHandler
{
    private $agenda;

    public function __construct(AgendaDEvenements $agenda)
    {
        $this->agenda = $agenda;
    }

    public function handle(ListeParticipantsQuery $requete): iterable
    {
        return $this->agenda->tousLesParticipants($this);
    }
}