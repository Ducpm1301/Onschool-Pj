<?php
class Student{
  
    // database connection and table name
    private $conn;
    private $table_name = "student_info";
  
    // object properties
    public $id;
    public $profile_code;
    public $student_code;
    public $firstname;
    public $lastname;
    public $gender;
    public $date_of_birth;
    public $place_of_birth;
    public $race;
    public $religion;
    public $phone;
    public $email;
    public $noicap;
    public $address;
    public $identity_number;
    public $student_status;
    public $note;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read students's info
    function read(){
    
        // select all query
        $query = "SELECT * FROM ". $this->table_name."";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create student
    function create(){
    
        // query to insert record
        $query = "INSERT INTO ". $this->table_name."   
                SET
                    profile_code =:profile_code, 
                    student_code =:student_code, 
                    firstname =:firstname, 
                    lastname =:lastname, 
                    gender =:gender, 
                    date_of_birth =:date_of_birth, 
                    place_of_birth =:place_of_birth, 
                    race =:race, 
                    religion =:religion, 
                    phone =:phone, 
                    email =:email, 
                    noicap =:noicap, 
                    address =:address, 
                    identity_number =:identity_number, 
                    student_status =:student_status, 
                    note =:note";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->profile_code=htmlspecialchars(strip_tags($this->profile_code));
        $this->student_code=htmlspecialchars(strip_tags($this->student_code));
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
        $this->place_of_birth=htmlspecialchars(strip_tags($this->place_of_birth));
        $this->race=htmlspecialchars(strip_tags($this->race));
        $this->religion=htmlspecialchars(strip_tags($this->religion));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->noicap=htmlspecialchars(strip_tags($this->noicap));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->identity_number=htmlspecialchars(strip_tags($this->identity_number));
        $this->student_status=htmlspecialchars(strip_tags($this->student_status));
        $this->note=htmlspecialchars(strip_tags($this->note));
    
        // bind values
        $stmt->bindParam(":profile_code", $this->profile_code);
        $stmt->bindParam(":student_code", $this->student_code);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":place_of_birth", $this->place_of_birth);
        $stmt->bindParam(":race", $this->race);
        $stmt->bindParam(":religion", $this->religion);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":noicap", $this->noicap);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":identity_number", $this->identity_number);
        $stmt->bindParam(":student_status", $this->student_status);
        $stmt->bindParam(":note", $this->note);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // used when filling up the update product form
    function readOne(){
    
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? ";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->profile_code = $row['profile_code'];
        $this->student_code = $row['student_code'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->gender = $row['gender'];
        $this->date_of_birth = $row['date_of_birth'];
        $this->place_of_birth = $row['place_of_birth'];
        $this->race = $row['race'];
        $this->religion = $row['religion'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->noicap = $row['noicap'];
        $this->address = $row['address'];
        $this->identity_number = $row['identity_number'];
        $this->student_status = $row['student_status'];
        $this->note = $row['note'];
    }

    // update student's info
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    profile_code =:profile_code, 
                    student_code =:student_code, 
                    firstname =:firstname, 
                    lastname =:lastname, 
                    gender =:gender, 
                    date_of_birth =:date_of_birth, 
                    place_of_birth =:place_of_birth, 
                    race =:race, 
                    religion =:religion, 
                    phone =:phone, 
                    email =:email, 
                    noicap =:noicap, 
                    address =:address, 
                    identity_number =:identity_number, 
                    student_status =:student_status, 
                    note =:note
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->profile_code=htmlspecialchars(strip_tags($this->profile_code));
        $this->student_code=htmlspecialchars(strip_tags($this->student_code));
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
        $this->place_of_birth=htmlspecialchars(strip_tags($this->place_of_birth));
        $this->race=htmlspecialchars(strip_tags($this->race));
        $this->religion=htmlspecialchars(strip_tags($this->religion));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->noicap=htmlspecialchars(strip_tags($this->noicap));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->identity_number=htmlspecialchars(strip_tags($this->identity_number));
        $this->student_status=htmlspecialchars(strip_tags($this->student_status));
        $this->note=htmlspecialchars(strip_tags($this->note));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind new values
        $stmt->bindParam(":profile_code", $this->profile_code);
        $stmt->bindParam(":student_code", $this->student_code);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":place_of_birth", $this->place_of_birth);
        $stmt->bindParam(":race", $this->race);
        $stmt->bindParam(":religion", $this->religion);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":noicap", $this->noicap);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":identity_number", $this->identity_number);
        $stmt->bindParam(":student_status", $this->student_status);
        $stmt->bindParam(":note", $this->note);
        $stmt->bindParam(":id", $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the product
function delete(){
  
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // search students
    function search($keywords){
    
        // select all query
        $query = "SELECT * FROM " . $this->table_name . "
                WHERE firstname LIKE ? OR lastname LIKE ? OR profile_code LIKE ? OR student_code LIKE ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->bindParam(4, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT * FROM " . $this->table_name . " LIMIT ?, ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
}