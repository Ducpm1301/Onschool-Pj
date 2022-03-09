<?php
    class database {
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpassword = "";
        private $dbname = "students";

        private $mysqli ="";
        private $result ="";
        private $conn = false;

        //connect database using constructed method

        public function __construct()
        {
            if(!$this -> conn){
                $this -> mysqli = new mysqli($this ->dbhost, $this -> dbuser , $this -> dbpassword, $this ->dbname );
                $this -> conn = true;

                if($this ->mysqli ->connect_error){
                    array_push($this-> result, $this -> mysqli_connection_error);
                    return false;
                }
            }else{
                return true;
            }
        }

        public function getResult(){
            $val = $this -> result;
            $this ->result = array();
            return $val;
        }

        public function __destruct()
        {
            if($this -> conn){
                if($this -> mysqli ->close()){
                    $this -> conn = false;
                    return true;
                }
            }else{
                return false;
            }
        }
    }