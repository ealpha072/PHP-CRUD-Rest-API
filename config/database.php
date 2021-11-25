<?php

use function PHPSTORM_META\type;

class Database {
        public $conn;

        public function getConnection(){
            $this->conn = null;
            try {
                $this->conn = new PDO('sqlite:../mydb.db');
                echo "Connection done";
            } catch (PDOException $e) {
                //throw $th;
                echo "Could not connect to database: ".$e->getMessage();
            }
            return $this->conn;
        }
    }

    
?>