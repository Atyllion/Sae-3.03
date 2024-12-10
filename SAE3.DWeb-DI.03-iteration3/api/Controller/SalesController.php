<?php

require_once("Controller.php");
require_once("Repository/SalesRepository.php");

class SalesController extends Controller {

    private SalesRepository $sales;

    public function __construct(){
        $this->sales = new SalesRepository();
    }

    // findAll()
    protected function processGetRequest(HttpRequest $request){
        return $this->sales->totalSalesAmount();
    }

}

?>