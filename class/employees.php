<?php
    class Employee {
        private $conn;

        public $id;
        public $name;
        public $email;
        public $age;
        public $designation;
        public $created;

        private $table = 'employee';

        public function __construct($db){
            $this->conn = $db; 
        }

        public function getAllEmployees(){
            $sql = 'SELECT * FROM '. $this->table. ' ';
            $stmt = $this->conn->conn-> prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        //NEW EMPLOYEE

        public function createEmployee(){
            $sql = 'INSERT INTO ' .$this->table. ' 
                SET(name = :name, email=:email, age=:age, designation=:designation, created
                =:created)';
            $stmt = $this->conn->conn->prepare($sql);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->designation = htmlspecialchars(strip_tags($this->designation));
            $this->created = htmlspecialchars(strip_tags($this->created));

            //bind parameters
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':designation', $this->designation);
            $stmt->bindParam(':created', $this->created);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        //READ SINGLE EMPLOYEE
        public function readSingle(){
            $sql = 'SELECT * FROM '.$this->table. ' WHERE id=:id LIMIT 0,1';
            $stmt = $this->conn->conn->prepare($sql);

            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->name = $results['name'];
            $this->email = $results['email'];
            $this->age = $results['age'];
            $this->desigantion = $results['designation'];
            $this->created = $results['created']; 
        }

        //UPDATE SINGLE EMPLOYEE
        public function updateSingle(){
            $sql = 'UPDATE '.$this->table. ' 
                SET(name=:name, email:email,  age=:age, designation=:designation, created
                =:created) WHERE id=:id';
            $stmt = $this->conn->conn->prepare($sql);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->designation = htmlspecialchars(strip_tags($this->designation));
            $this->created = htmlspecialchars(strip_tags($this->created));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':designation', $this->designation);
            $stmt->bindParam(':created', $this->created);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

        //DELETE SINGLE EMPLOYEE
        public function deleteEmployee(){
            $sql = 'DELETE FROM '.$this->table.' WHERE id=:id' ;
            $stmt = $this->conn->conn->prepare();

            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
    }

?>