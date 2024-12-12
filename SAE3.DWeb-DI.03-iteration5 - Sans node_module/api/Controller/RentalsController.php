<?php

require_once("Controller.php");
require_once("Repository/RentalsRepository.php");

class RentalsController extends Controller {

    private RentalsRepository $rentals;

    public function __construct(){
        $this->rentals = new RentalsRepository();
    }

    // findAll()
    protected function processGetRequest(HttpRequest $request){
        return $this->rentals->RentalsLast6Month();
    }

}

?>