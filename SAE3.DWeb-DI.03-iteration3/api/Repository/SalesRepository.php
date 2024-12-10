<?php

require_once("Repository/EntityRepository.php");
require_once("Class/Sales.php");

class SalesRepository extends EntityRepository {

    public function __construct(){
        // appel au constructeur de la classe mère (va ouvrir la connexion à la bdd)
        parent::__construct();
    }

    public function findAll(): array {
        $requete = $this->cnx->prepare("SELECT * FROM Sales");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $sales = [];

        foreach ($answer as $obj){
            $p = new Sales($obj->id);
            $p->setCustomer($obj->customer_id);
            $p->setMovie($obj->movie_id);
            // $p->setDate($obj->rental_date);
            $p->setPrice($obj->purchase_price);
            array_push($sales, $p);
        }

        return $sales;
    }

    public function totalSalesAmount(): float {
        $requete = $this->cnx->prepare("
            SELECT 
                SUM(purchase_price) as Salestotal
            FROM 
                Sales 
            WHERE 
                MONTH(purchase_date) = MONTH(CURRENT_DATE())
        ");
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_OBJ);

        return (float) $result->Salestotal;
    }

    public function TopMoviesSales(): array {
        $requete = $this->cnx->prepare("
            SELECT 
                movie_id, COUNT(movie_id) as Sales
            FROM 
                Sales 
            WHERE 
                purchase_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
            GROUP BY 
                movie_id
            ORDER BY 
                Sales DESC
            LIMIT 3
        ");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $topMovies = [];

        foreach ($answer as $obj){
            $p = new Sales($obj->movie_id);
            $p->setSales($obj->Sales);
            array_push($topMovies, $p);
        }

        return $topMovies;
    }
}

?>
