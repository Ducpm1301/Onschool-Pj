<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // required to decode json web token
    include_once 'config/core.php';
    include_once '../vendor/firebase/php-jwt/src/BeforeValidException.php';
    include_once '../vendor/firebase/php-jwt/src/ExpiredException.php';
    include_once '../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
    include_once '../vendor/firebase/php-jwt/src/JWT.php';
    include_once '../vendor/firebase/php-jwt/src/Key.php';
    use \Firebase\JWT\JWT;
    use \Firebase\JWT\Key;
    
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
    
    // get jwt
    $jwt=isset($data->jwt) ? $data->jwt : "";
    
    // if jwt is not empty
    if($jwt){
    
        // if decode succeed, show user details
        try {
    
            // decode jwt
            $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    
            // set user property values
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = $data->password;
            $user->id = $decoded->data->id;
            
            // update the user record
            if($user->update()){
                // we need to re-generate jwt because user details might be different
                $token = array(
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "iss" => $issuer,
                    "data" => array(
                        "id" => $user->id,
                        "name" => $user->name,
                        "email" => $user->email
                    )
                );
                $jwt = JWT::encode($token, $key,'HS256');
                
                // set response code
                http_response_code(200);
                
                // response in json format
                echo json_encode(
                        array(
                            "message" => "Thông tin người dùng đã được cập nhật.",
                            "jwt" => $jwt
                        )
                    );
            }
            
            // message if unable to update user
            else{
                // set response code
                http_response_code(401);
            
                // show error message
                echo json_encode(array("message" => "Không thể cập nhật thông tin người dùng."));
            }
        }
    
        // if decode fails, it means jwt is invalid
        catch (Exception $e){
        
            // set response code
            http_response_code(401);
        
            // show error message
            echo json_encode(array(
                "message" => "Truy cập bị từ chối.",
                "error" => $e->getMessage()
            ));
        }
    }
    
    // show error message if jwt is empty
    else{
    
        // set response code
        http_response_code(401);
    
        // tell the user access denied
        echo json_encode(array("message" => "Truy cập bị từ chối."));
    }
