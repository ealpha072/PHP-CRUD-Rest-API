<?php

    use function PHPSTORM_META\type;

    class Database {
        public $conn;

        private $host = "localhost";
        private $database_name = "employees";
        private $username = "root";
        private $password = "";

        public function getConnection(){
            //$this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                echo "Connection done";
                return $this->conn;
            } catch (PDOException $e) {
                //throw $th;
                echo "Could not connect to database: ".$e->getMessage();
            }
        }
    }    
?>