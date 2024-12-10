<?php

class Rentals implements JsonSerializable {
   
    private int $id; // id de la location
    private int $customer_id; // id du client
    private int $movie_id; // id du film
    // private DateTime $rental_date; // date de location
    private float $rental_price; // prix de la location

    public function __construct(int $id) {
        $this->id = $id;
    }

    // ID

        /**
        * Get the value of id
        */ 
        public function getId(): int
        {
            return $this->id;
        }

        /**
        * Set the value of id
        *
        * @return  self
        */ 
        public function setId(int $id): self
        {
            $this->id = $id;
            return $this;
        }

    // CUSTOMER ID

        /**
        * Get the value of id
        */
        public function getCustomer(): int
        {
            return $this->customer_id;
        }

        /**
        * Set the value of id
        *
        * @return  self
        */
        public function setCustomer(int $customer_id): self
        {
            $this->customer_id = $customer_id;
            return $this;
        }

    // MOVIE ID
    
        /**
        * Get the value of id
        */
        public function getMovie(): int
        {
            return $this->movie_id;
        }
    
        /**
        * Set the value of id
        *
        * @return  self
        */
        public function setMovie(string $movie_id): self
        {
            $this->movie_id = $movie_id;
            return $this;
        }


        
    // RENTAL DATE
    
            // /**
            // * Get the value of date
            // */
            // public function getDate(): DateTime
            // {
            //     return $this->rental_date;
            // }
        
            // /**
            // * Set the value of date
            // *
            // * @return  self
            // */
            // public function setDate(DateTime $rental_date): self
            // {
            //     $this->rental_date = $rental_date;
            //     return $this;
            // }
    
    // RENTAL PRICE
    
        /**
        * Get the value of price
        */
        public function getPrice(): float
        {
            return $this->rental_price;
        }
    
        /**
        * Set the value of price
        *
        * @return  self
        */
        public function setPrice(float $rental_price): self
        {
            $this->rental_price = $rental_price;
            return $this;
        }

    public function jsonSerialize(): mixed{
        return [
            "id" => $this->id,
            "customer" => $this->customer_id,
            "movie" => $this->movie_id,
            // "date" => $this->rental_date,
            "price" => $this->rental_price,
        ];
    }
}

// ancien nom : Entity.php