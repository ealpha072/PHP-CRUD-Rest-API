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

    $employee->readSingle();

    if($employee->name != null){
        $arr = Array(
            "id" =>  $employee->id,
            "name" => $employee->name,
            "email" => $employee->email,
            "age" => $employee->age,
            "designation" => $employee->designation,
            "created" => $employee->created
        );

        http_response_code(200);
        echo json_encode($arr);
    }else{
        http_response_code(404);
        echo json_encode('Employee not found');
    }

?>