<?php

// Entity
class Movies implements JsonSerializable {
   
    private int $id; // id du film
    private string $title; // titre du film
    private string $genre; // genre du film
    // private DateTime $release; // date de sortie du film (DateTime)
    private int $duration; // durée du film
    private float $rating; // note du film

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

    // TITLE

        /**
        * Get the value of title
        */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
        * Set the value of title
        *
        * @return  self
        */
        public function setTitle(string $title): self
        {
            $this->title = $title;
            return $this;
        }

    // GENRE
    
        /**
        * Get the value of genre
        */
        public function getGenre(): string
        {
            return $this->genre;
        }
    
        /**
        * Set the value of genre
        *
        * @return  self
        */
        public function setGenre(string $genre): self
        {
            $this->genre = $genre;
            return $this;
        }

    // RELEASE
        
        // /**
        // * Get the value of release
        // */
        // public function getRelease(): DateTime
        // {
        //     return $this->release;
        // }
        
        // /**
        // * Set the value of release
        // *
        // * @return  self
        // */
        // public function setRelease(DateTime $release): self
        // {
        //     $this->release = $release;
        //     return $this;
        // }
        
    // DURATION
    
            /**
            * Get the value of duration
            */
            public function getDuration(): int
            {
                return $this->duration;
            }
        
            /**
            * Set the value of duration
            *
            * @return  self
            */
            public function setDuration(int $duration): self
            {
                $this->duration = $duration;
                return $this;
            }
    
    // RATING
    
        /**
        * Get the value of rating
        */
        public function getRating(): float
        {
            return $this->rating;
        }
    
        /**
        * Set the value of rating
        *
        * @return  self
        */
        public function setRating(float $rating): self
        {
            $this->rating = $rating;
            return $this;
        }

    public function jsonSerialize(): mixed{
        return [
            "id" => $this->id,
            "title" => $this->title,
            "genre" => $this->genre,
            // "release" => $this->release,
            "duration" => $this->duration,
            "rating" => $this->rating,
        ];
    }
}

// ancien nom : Entity.php