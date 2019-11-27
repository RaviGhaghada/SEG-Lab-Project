<?php
	require_once('../../private/shared/classes/databaseobject.class.php');

    /**
     * A class to represent an event.
     * Example: Disco-night, Brunch, etc.
     */
    class News extends DatabaseObject{
        
        static protected $table_name = 'news';
        static protected $db_columns = ['newsID', 'authorID', 'title', 'description', 'releaseDate', 'expiryDate'];

        public $newsID;
        public $authorID;
        public $title;
        public $description;
        public $releaseDate;
        public $expiryDate;

        public function __construct($args=[]) {
            $this->authorID = $args['authorID'] ?? '';
            $this->title = $args['title'] ?? '';
            $this->description = $args['description'] ?? '';
            $this->releaseDate = $args['releaseDate'] ?? '';
            $this->expiryDate = $args['expiryDate'] ?? '';
        }

        protected function valnewsIDate() {
            $this->errors = [];
        
            if(is_blank($this->authorID)) {
              $this->errors[] = "Creator newsID cannot be blank.";
            }
            if(is_blank($this->title)) {
              $this->errors[] = "Title cannot be blank.";
            }
            if(is_blank($this->description)) {
              $this->errors[] = "Title cannot be blank.";
            }
            if(is_blank($this->releaseDate)) {
                $this->errors[] = "Release date cannot be blank.";
            }
            if(is_blank($this->expiryDate)){
                $this->errors[] = "Event end date cannot be blank.";
            }
            return $this->errors;
        }
      
    }

    ?>