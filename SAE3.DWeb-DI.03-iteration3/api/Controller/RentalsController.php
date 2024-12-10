<?php

require_once("Controller.php");
require_once("Repository/RentalsRepository.php");

class RentalsController extends Controller {

    private RentalsRepository $rentals;

    public function __construct(){
        $this->rentals = new RentalsRepository();
    }

    /*
        $id = $request->getId("id");
        if ($id){
            // URI is .../products/{id}
            $p = $this->products->find($id);
            return $p == null ? false : $p;
        } else {
            // URI is .../products
            $cat = $request->getParam("category"); // is there a category parameter in the request?
            if ($cat == false) // no request category, return all products
                return $this->products->findAll();
            else // return only products of category $cat
                return $this->products->findAllByCategory($cat);
        }
    */

    // findAll()
    protected function processGetRequest(HttpRequest $request){
        return $this->rentals->totalRentalsAmount();
    }

}