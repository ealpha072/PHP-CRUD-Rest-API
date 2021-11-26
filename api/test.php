<?php
    include_once('../config/database.php');
    include_once('../class/employees.php');

    $database = new Database();
    $database->getConnection();
    
    $employee = new Employee($database);
    $stmt = $employee->getAllEmployees();

?>