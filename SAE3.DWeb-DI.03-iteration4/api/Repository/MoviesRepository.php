<?php

require_once("Repository/EntityRepository.php");
require_once("Class/Movies.php");

class MoviesRepository extends EntityRepository {

    public function __construct(){
        // appel au constructeur de la classe mère (va ouvrir la connexion à la bdd)
        parent::__construct();
    }

    public function findAll(): array {
        $requete = $this->cnx->prepare("SELECT * FROM Movies");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $movies = [];

        foreach ($answer as $obj){
            $p = new Movies($obj->id);
            $p->setTitle($obj->movie_title);
            $p->setGenre($obj->genre);
            // $p->setRelease($obj->release_date);
            $p->setDuration($obj->duration_minutes);
            $p->setRating($obj->rating);
            array_push($movies, $p);
        }

        return $movies;
    }
}

?>
