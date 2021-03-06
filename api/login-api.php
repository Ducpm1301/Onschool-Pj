<?php
    // required headers
    header("Access-Control-Allow-Origin: http://localhost/OnschoolPj/");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // files needed to connect to database
    include_once 'config/db.php';
    include_once 'user.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // instantiate user object
    $user = new User($db);
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // set product property values
    $user->email = $data->email;
    $email_exists = $user->emailExists();
    
    // generate json web token
    include_once 'config/core.php';
    include_once '../vendor/firebase/php-jwt/src/BeforeValidException.php';
    include_once '../vendor/firebase/php-jwt/src/ExpiredException.php';
    include_once '../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
    include_once '../vendor/firebase/php-jwt/src/JWT.php';

    use \Firebase\JWT\JWT;
    
    // check if email exists and if password is correct
    if($email_exists && password_verify($data->password, $user->password)){
    
        $token = array(
        "iat" => $issued_at,
        "exp" => $expiration_time,
        "data" => array(
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email
        )
        );
    
        // set response code
        http_response_code(200);
    
        // generate jwt
        $jwt = JWT::encode($token, $key,'HS256');
        echo json_encode(
                array(
                    "message" => "Đăng nhập thành công.",
                    "jwt" => $jwt
                )
            );
    
    }
    
    // login failed
    else{
    
        // set response code
        http_response_code(401);
    
        // tell the user login failed
        echo json_encode(array("message" => "Đăng nhập thất bại."));
    }