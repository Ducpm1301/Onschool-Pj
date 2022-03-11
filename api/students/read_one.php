<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/db.php';
    include_once '../objects/students.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // prepare product object
    $student = new Student($db);
    
    // set ID property of record to read
    $student->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    // read the details of product to be edited
    $student->readOne();
    
    if($student != null){
        // create array
        $student_arr = array(
            "profile_code" =>  $student->profile_code,
            "student_code" => $student->student_code,
            "firstname" => $student->firstname,
            "lastname" => $student->lastname,
            "gender" => $student->gender,
            "date_of_birth" => $student->date_of_birth,
            "place_of_birth" => $student->place_of_birth,
            "race" => $student->race,
            "religion" => $student->religion,
            "phone" => $student->phone,
            "email" => $student->email,
            "noicap" => $student->noicap,
            "address" => $student->address,
            "identity_number" => $student->identity_number,
            "student_status" => $student->student_status,
            "note" => $student->note
        );
    
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode($student_arr);
    }
    
    else{
        // set response code - 404 Not found
        http_response_code(404);
    
        // tell the user this student does not exist
        echo json_encode(array("message" => "Không tồn tại sinh viên này."));
    }