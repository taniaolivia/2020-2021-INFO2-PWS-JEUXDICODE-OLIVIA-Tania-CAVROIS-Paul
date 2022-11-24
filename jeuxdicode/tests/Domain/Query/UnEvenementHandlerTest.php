<?php
namespace App\Domain\Query;
use App\Domain\AgendaDEvenements;
use App\Domain\Query\UnEvenementHandler;
use App\Domain\Query\UnEvenementQuery;
use PHPUnit\Framework\TestCase;

class UnEvenementHandlerTest extends TestCase
{
    public function test_obtenir_l_evenement_interroge_l_annuaire()
    {
        //Arrange
        $requete=new UnEvenementQuery();
        $agenda = $this->createMock(AgendaDEvenements::class);
        $handler=new UnEvenementHandler($agenda);

        //Assert
        $agenda->expects($this->once())->method("getUnEvenementParId");

        // Act
        $levenement = $handler->handle($requete);

    }
}
