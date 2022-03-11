<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/db.php';
    
    // instantiate student object
    include_once '../objects/students.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $student = new Student($db);
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty
    if(
        !empty($data->fileId) &&
        !empty($data->studentId) &&
        !empty($data->fname) &&
        !empty($data->lname) &&
        !empty($data->gender) &&
        !empty($data->birth) &&
        !empty($data->birthPlace) &&
        !empty($data->race) &&
        !empty($data->religion) &&
        !empty($data->number) &&
        !empty($data->email) &&
        !empty($data->noicap) &&
        !empty($data->address) &&
        !empty($data->citizenId) &&
        !empty($data->studentStt) &&
        !empty($data->note)

    ){
    
        // set student property values
        $student->profile_code = $data->fileId;
        $student->student_code = $data->studentId;
        $student->firstname = $data->fname;
        $student->lastname = $data->lname;
        $student->gender = $data->gender;
        $student->date_of_birth = $data->birth;
        $student->place_of_birth = $data->birthPlace;
        $student->race = $data->race;
        $student->religion = $data->religion;
        $student->phone = $data->number;
        $student->email = $data->email;
        $student->noicap = $data->noicap;
        $student->address = $data->address;
        $student->identity_number = $data->citizenId;
        $student->student_status = $data->studentStt;
        $student->note = $data->note;
    
        // create student
        if($student->create()){
    
            // set response code - 201 created
            http_response_code(201);
    
            // tell the user
            echo json_encode(array("message" => "Hồ sơ sinh viên đã được tạo."));
        }
    
        // if unable to create the product, tell the user
        else{
    
            // set response code - 503 service unavailable
            http_response_code(503);
    
            // tell the user
            echo json_encode(array("message" => "Không thể tạo hồ sơ sinh vi."));
        }
    }
    
    // tell the user data is incomplete
    else{
    
        // set response code - 400 bad request
        http_response_code(400);
    
        // tell the user
        echo json_encode(array("message" => "Không thể tạo thông tin sinh viên. Dữ liệu cần nhập còn bị bỏ trống."));
    }