<?php

require_once("Repository/EntityRepository.php");
require_once("Class/Rentals.php");

class RentalsRepository extends EntityRepository {

    public function __construct(){
        // appel au constructeur de la classe mère (va ouvrir la connexion à la bdd)
        parent::__construct();
    }

    public function findAll(): array {
        $requete = $this->cnx->prepare("SELECT * FROM Rentals");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $rentals = [];

        foreach ($answer as $obj){
            $p = new Rentals($obj->id);
            $p->setCustomer($obj->customer_id);
            $p->setMovie($obj->movie_id);
            // $p->setDate($obj->rental_date);
            $p->setPrice($obj->rental_price);
            array_push($rentals, $p);
        }

        return $rentals;
    }

    public function totalRentalsAmount(): float {
        $requete = $this->cnx->prepare("
            SELECT 
            SUM(rental_price) as Rentalstotal
            FROM Rentals 
            WHERE MONTH(rental_date) = MONTH(CURRENT_DATE())
        ");
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_OBJ);

        return (float) $result->Rentalstotal;
    }

    public function TopMoviesRentals(): array {
        $requete = $this->cnx->prepare("
            SELECT 
            movie_id, COUNT(movie_id) as Rentals
            FROM Rentals 
            WHERE rental_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
            GROUP BY movie_id
            ORDER BY Rentals DESC
            LIMIT 3
        ");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $topMovies = [];

        foreach ($answer as $obj){
            $p = new Rentals($obj->movie_id);
            $p->setRentals($obj->Rentals);
            array_push($topMovies, $p);
        }

        return $topMovies;
    }
}

?>
