<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;
use App\Domain\Query\ListeEvenementsHandler;
use App\Domain\Query\ListeEvenementsQuery;
use PHPUnit\Framework\TestCase;

class ListeEvenementsHandlerTest extends TestCase
{
    public function test_obtenir_la_liste_des_evenements_interroge_l_annuaire()
    {
        //Arrange
        $requete=new ListeEvenementsQuery();
        $agenda = $this->createMock(AgendaDEvenements::class);
        $handler=new ListeEvenementsHandler($agenda);

        //Assert
        $agenda->expects($this->once())->method("tousLesEvenements");

        // Act
        $listeEvenements = $handler->handle($requete);

    }
}
