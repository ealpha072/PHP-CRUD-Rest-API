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

    /*$data = json_encode(file_get_contents('../config/input.txt'));

    $employee->id =$data->id;

    $employee->name = $data->name;
    $employee->email = $data->email;
    $employee->age = $data->age;
    $employee->designation = $data->designation;
    $employee->created = date('Y-m-d H:i:s');*/

    if($employee->updateSingle()){
        echo "Updated employee";
    }else{
        echo 'Couldnt update employee';
    }
?>