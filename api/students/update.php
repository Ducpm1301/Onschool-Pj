<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/db.php';
    include_once '../objects/students.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // prepare product object
    $student = new Student($db);
    
    // get id of product to be edited
    $data = json_decode(file_get_contents("php://input"));
    
    // set ID property of product to be edited
    $student->id = $data->id;
    
    // set product property values
    $student->profile_code = $data->profile_code;
    $student->student_code = $data->student_code;
    $student->firstname = $data->firstname;
    $student->lastname = $data->lastname;
    $student->gender = $data->gender;
    $student->date_of_birth = $data->date_of_birth;
    $student->place_of_birth = $data->place_of_birth;
    $student->race = $data->race;
    $student->religion = $data->religion;
    $student->phone = $data->phone;
    $student->email = $data->email;
    $student->noicap = $data->noicap;
    $student->address = $data->address;
    $student->identity_number = $data->identity_number;
    $student->student_status = $data->student_status;
    $student->note = $data->note;
    
    // update the product
    if($student->update()){
    
        // set response code - 200 ok
        http_response_code(200);
    
        // tell the user
        echo json_encode(array("message" => "Thông tin sinh viên đã được cập nhật."));
    }
    
    // if unable to update the product, tell the user
    else{
    
        // set response code - 503 service unavailable
        http_response_code(503);
    
        // tell the user
        echo json_encode(array("message" => "Không thể cập nhật thông tin sinh viên."));
    }