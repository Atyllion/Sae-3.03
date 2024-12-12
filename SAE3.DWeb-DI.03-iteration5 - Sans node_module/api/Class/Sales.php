<?php

class Sales implements JsonSerializable {
   
    private int $id; // id de la location
    private int $customer_id; // id du client
    private int $movie_id; // id du film
    private DateTime $purchase_date; // date de l'achat
    private float $purchase_price; // prix de l'achat

    
    public function __construct(float $purchase_price = 0.0, DateTime $purchase_date) {
        $this->purchase_date = $purchase_date;
        $this->purchase_price = $purchase_price;
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


        
    // PURCHASE DATE
    
            /**
            * Get the value of date
            */
            public function getDate(): DateTime
            {
                return $this->rental_date;
            }
        
            /**
            * Set the value of date
            *
            * @return  self
            */
            public function setDate(DateTime $rental_date): self
            {
                $this->rental_date = $rental_date;
                return $this;
            }
    
    // PURCHASE PRICE
    
        /**
        * Get the value of price
        */
        public function getPrice(): float
        {
            return $this->purchase_price;
        }
    
        /**
        * Set the value of price
        *
        * @return  self
        */
        public function setPrice(float $purchase_price): self
        {
            $this->purchase_price = $purchase_price;
            return $this;
        }

    public function jsonSerialize(): mixed{
        return [
            "date" => $this->purchase_date,
            "price" => $this->purchase_price,
        ];
    }
}


