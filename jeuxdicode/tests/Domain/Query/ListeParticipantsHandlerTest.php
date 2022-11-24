<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;
use App\Domain\Query\ListeParticipantsHandler;
use App\Domain\Query\ListeParticipantsQuery;
use PHPUnit\Framework\TestCase;

class ListeParticipantsHandlerTest extends TestCase
{
    public function test_obtenir_la_liste_des_participants_interroge_l_annuaire()
    {
        //Arrange
        $requete=new ListeParticipantsQuery();
        $agenda = $this->createMock(AgendaDEvenements::class);
        $handler=new ListeParticipantsHandler($agenda);

        //Assert
        $agenda->expects($this->once())->method("tousLesParticipants");

        // Act
        $listeParticipants = $handler->handle($requete);

    }
}
