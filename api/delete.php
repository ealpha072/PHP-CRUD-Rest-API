<?php
    header('Access-Control-Allow-Origin: *');
    header(('Content-TYpe: application/json; charset=UTF-8'));
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once('../config/database.php');
    include_once('../class/employees.php');

    $database = new Database();
    $database->getConnection();

    $employee = new Employee($database);
    $employee->id = isset($_GET['id']) ? isset($_GET['id']) : die();

    if($employee->deleteEmployee()){
        echo "Employee deleted";
    }else{
        echo 'Couldnt delete employee';
    }
?>