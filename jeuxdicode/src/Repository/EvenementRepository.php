<?php

namespace App\Repository;

use App\Domain\AgendaDEvenements;
use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository implements AgendaDEvenements
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    public function myFindAll()
    {
        //création du queryBuilder paramétreé avec l'alias de l'enité événement
        $queryBuilder = $this->createQueryBuilder('e');
        //récupération de la query à partir du querBuilder
        $query = $queryBuilder->getQuery();
        //récupération du résultat à partir de la query
        $results = $query->getResult();
        //on retourne les résultats
        return $results;
    }

    public function myFindAll2020()
    {
        //création du queryBuilder paramétreé avec l'alias de l'enité événement
        $queryBuilder = $this->createQueryBuilder('e');
        //récupération de la query à partir du querBuilder
        $query = $queryBuilder->where('e.date_heure_debut between :start and :end')
                              ->setParameter('start', new \DateTime('2020-01-01 00:00:00'))
                              ->setParameter('end', new \DateTime('2020-12-31 23:59:00'))
                              ->getQuery();
        //récupération du résultat à partir de la query
        $results = $query->getResult();
        //on retourne les résultats
        return $results;
    }

    public function myFindAllDQL()
    {
        $query = $this->_em->createQuery('SELECT e 
                                          FROM App\Entity\Evenement e');
        //récupération du résultat à partir de la query
        $results = $query->getResult();
        //on retourne les résultats
        return $results;
    }

    public function myFindTitreDQL($titre):array
    {
        $query = $this->_em->createQuery('SELECT e 
                                          FROM App\Entity\Evenement e 
                                          WHERE e.titre like :titre')
                           ->setParameter('titre', '%'.$titre.'%');
        //on retourne les résultats
        return $query->getResult();

    }

    public function myFindAllNot2020()
    {
        //création du queryBuilder paramétreé avec l'alias de l'enité événement
        $queryBuilder = $this->createQueryBuilder('e');
        //récupération de la query à partir du querBuilder
        $query = $queryBuilder->where('e.date_heure_debut not between :start and :end')
            ->setParameter('start', new \DateTime('2020-01-01 00:00:00'))
            ->setParameter('end', new \DateTime('2020-12-31 23:59:00'))
            ->getQuery();
        //récupération du résultat à partir de la query
        $results = $query->getResult();
        //on retourne les résultats
        return $results;
    }

    public function tousLesEvenements(): iterable
    {
        return $this->findAll();
    }

    public function getUnEvenementParId($idEvenement): Evenement
    {
        return $this->findOneBy(["id"=>$idEvenement]);
    }

    public function tousLesParticipants($idEvenement): Evenement
    {
        return $this->findOneBy(["id"=>$idEvenement])->getMembres();
    }
    
    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
