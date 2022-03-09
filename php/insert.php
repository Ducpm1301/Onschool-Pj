<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname ="student-info";

    if(!$conn = mysqli_connect($dbhost , $dbuser , $dbpassword , $dbname)){
        die('fail to connect');
    }
    if (isset($_POST['submit'])){
        $studentId = $_POST['studentId'];
        $fileId = $_POST['fileId'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];
        $birthPlace = $_POST['birthPlace'];
        $race = $_POST['race'];
        $religion = $_POST['religion'];
        $citizenId = $_POST['citizenId'];
        $noicap = $_POST['noicap'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $studentStt = $_POST['studentStt'];

        $sql ="INSERT INTO `student-info`(`studentId`, `fileId`, `fname`, `lname`, `gender`, `birth`, `birthPlace`, `race`, `religion`, `citizenId`, `noicap`, `number`, `email`, `address`, `note`, `studentStt`)
         VALUES('$studentId','$fileId','$fname ','$lname','$gender','$birth','$birthPlace','$race','$religion','$citizenId','$noicap','$number','$email','$address','$note','$studentStt')";
        $insert = mysqli_query($conn, $sql);

        if ($insert){
            echo "<script>alert('Form confirm!')</script>";
        }else{
            echo "<script>alert('Something went wrong')</script>";
        }
    }      
?>