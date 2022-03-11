<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/core_pagination.php';
    include_once '../shared/utilities.php';
    include_once '../config/db.php';
    include_once '../objects/students.php';
    
    // utilities
    $utilities = new Utilities();
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $student = new Student($db);
    
    // query student
    $stmt = $student->readPaging($from_record_num, $records_per_page);
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // student array
        $student_arr=array();
        $student_arr["records"]=array();
        $student_arr["paging"]=array();
    
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            extract($row);
    
            $student_info=array(
                "id" => $id,
                "profile_code" => $profile_code,
                "student_code" => $student_code,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "gender" => $gender,
                "date_of_birth" => $date_of_birth,
                "place_of_birth" => $place_of_birth,
                "race" => $race,
                "religion" => $religion,
                "phone" => $phone,
                "email" => $email,
                "noicap" => $noicap,
                "address" => $address,
                "identity_number" => $identity_number,
                "student_status" => $student_status,
                "note" => $note
            );
    
            array_push($student_arr["records"], $student_info);
        }
    
    
        // include paging
        $total_rows=$student->count();
        $page_url="{$home_url}product/read_paging.php?";
        $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
        $student_arr["paging"]=$paging;
    
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode($student_arr);
    }
    
    else{
    
        // set response code - 404 Not found
        http_response_code(404);
    
        // tell the user products does not exist
        echo json_encode(
            array("message" => "Không tìm thấy sinh viên.")
        );
    }