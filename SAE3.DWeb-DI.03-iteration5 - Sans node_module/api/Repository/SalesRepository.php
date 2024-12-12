<?php

require_once("Repository/EntityRepository.php");
require_once("Class/Sales.php");
require_once("Class/Movies.php");

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
            $p = new Sales((int)$obj->id);
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
                s.movie_id, m.id, m.movie_title
            FROM 
                Sales s
            JOIN 
                Movies m ON s.movie_id = m.id
            WHERE 
                MONTH(s.purchase_date) = MONTH(CURRENT_DATE())
            GROUP BY 
                m.movie_title
            ORDER BY 
                COUNT(s.id) DESC
            LIMIT 3
        ");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $topMovies = [];


        foreach ($answer as $obj){
            // $p = new Sales($obj->movie_id);
            $p = new Movies($obj->movie_id);
            $p->setTitle($obj->movie_title);
            array_push($topMovies, $p);
        }

        return $topMovies;
    }

    public function SalesLast6Month(): array{
        $requete = $this->cnx->prepare("
        SELECT 
            DATE_FORMAT(purchase_date, '%Y-%m') AS purchase_date, 
            SUM(purchase_price) AS total
        FROM 
            Sales
        WHERE 
            purchase_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 5 MONTH) AND CURDATE()
        GROUP BY 
            DATE_FORMAT(purchase_date, '%Y-%m')
        ORDER BY 
            DATE_FORMAT(purchase_date, '%Y-%m') ASC
        ");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $sales = [];

        foreach ($answer as $obj){
            $p = new Sales((float)$obj->total, new DateTime ($obj->purchase_date));
            array_push($sales, $p);
            // IL FAUT METTRE LES VALEURS ICI MEME SI ELLES NE SERVENT A RIEN (celle du constructeur)
        }

        return $sales;
    }
}

?>

