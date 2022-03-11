<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/db.php';
    include_once '../objects/students.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // prepare product object
    $student = new Student($db);
    
    // get product id
    $data = json_decode(file_get_contents("php://input"));
    
    // set product id to be deleted
    $student->id = $data->id;
    
    // delete the product
    if($student->delete()){
    
        // set response code - 200 ok
        http_response_code(200);
    
        // tell the user
        echo json_encode(array("message" => "Thông tin sinh viên đã được xóa."));
    }
    
    // if unable to delete the product
    else{
    
        // set response code - 503 service unavailable
        http_response_code(503);
    
        // tell the user
        echo json_encode(array("message" => "Không thể xóa thông tin của sinh viên."));
    }