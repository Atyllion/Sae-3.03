<?php

require_once("Repository/EntityRepository.php");
// require_once("Class/Rentals.php");
require_once("Class/Movies.php");

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
            $p->setTitle($obj->title);
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
        SELECT m.id as movie_id, m.movie_title, COUNT(r.id) as Rentals
        FROM Rentals r
        JOIN Movies m ON r.movie_id = m.id
        WHERE r.rental_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
        GROUP BY m.movie_title
        ORDER BY Rentals DESC
        LIMIT 3
    ");
    $requete->execute();
    $answer = $requete->fetchAll(PDO::FETCH_OBJ);
    
    $topMovies = [];
    
    foreach ($answer as $obj){
        // $p = new Rentals($obj->movie_id);
        $p = new Movies($obj->movie_id);
        $p->setTitle($obj->movie_title);
        // $p->setRentals($obj->Rentals);
        array_push($topMovies, $p);
    }
    
    return $topMovies;
    }
}

?>
