<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/db.php';
include_once '../objects/students.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$student = new Student($db);
  
// query products
$stmt = $student->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // students array
    $students_arr=array();
    $students_arr["studentInfo"]=array();
  
    // retrieve our table contents
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
  
        $student_item=array(
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
  
        array_push($students_arr["studentInfo"], $student_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($students_arr);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "Không tìm thấy sinh viên.")
    );
}
