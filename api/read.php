<?php
    header('Access-Control-Allow-Origin');
    header(('Content-TYpe: application/json; charset=UTF-8'));

    include_once('../config/database.php');
    include_once('../class/employees.php');

    $database = new Database();
    $database->getConnection();

    $employee = new Employee($database);

    $stmt = $employee->getAllEmployees();

    $resultsCount = $stmt->rowCount();

    echo json_encode($resultsCount);

    if($resultsCount > 1){
        $employeeArray = array();
        $employeeArray['body'] = array();
        $employeeArray['count'] = $resultsCount;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $extracted = Array(
                'id'=>$id,
                'name'=>$name,
                'email'=>$email,
                'age'=>$age,
                'designation'=>$designation,
                'created'=>$created
            );

            array_push($employeeArray['body'], $extracted);
        }
        echo json_encode($employeeArray);

    }else{
        http_response_code(404);
        echo json_encode(array('message'=>'No record found'));
    }



?>