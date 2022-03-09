<?php
    // used to get mysql database connection
    class Database{
    
        // specify your own database credentials
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpassword = "";
        private $dbname = "students";
        public $conn;
    
        // get the database connection
        public function getConnection(){
    
            $this->conn = null;
    
            try{
                $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpassword);
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
    
            return $this->conn;
        }
    }