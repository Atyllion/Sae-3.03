<?php

require_once("Controller.php");
require_once("Repository/MoviesRepository.php");

class MoviesController extends Controller {

    private MoviesRepository $movies;

    public function __construct(){
        $this->movies = new MoviesRepository();
    }

    protected function processGetRequest(HttpRequest $request){
        return $this->movies->findAll();
    }

}

?>