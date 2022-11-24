<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;

class UnEvenementHandler
{
    private $agenda;

    public function __construct(AgendaDEvenements $agenda)
    {
        $this->agenda = $agenda;
    }

    public function handle(UnEvenementQuery $requete): iterable
    {
        return $this->agenda->getUnEvenementParId($this);
    }
}