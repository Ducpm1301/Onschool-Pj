<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin sinh viên</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.15.4-web/css/fontawesome.min.css">
    <script src="../jquery/jquery.js"></script>
    <script src ="../jquery/jqueryValidationPlugin.js"></script>
    <script src ="../js/register.js"></script>
    <script src ="../app/create_student.js"></script>
    <style>
        @media only screen and (max-width: 350px){
            .row{
                display:flex;
                flex-direction: column;
            }
        }

        option[value=""][default]{
            display:none;
        }
    </style>
</head>
<body class ="bg-image" style ="background-image:url(../img/1.png);height:100%;background-size: cover;">
    <div class ="container">
        <fieldset>
            <legend class ="fw-bold">THÊM MỚI SINH VIÊN</legend>
            <div  class ="container bg-white" style ="border: 5px solid black;border-radius: 20px;">
                <div class ="d-flex">
                    <h5 class ="flip">Thông tin cơ bản<i class="fas fa-caret-down"></i></h5>
                </div>

                                    <!-- STUDENT INFOMATION FORM -->

                <form class ="formValidation panel" action ="" method ="post">
                    <div class="container mb-2">
                        <div>
                            <label for="fileId" class="form-label fw-bold">Mã hồ sơ</label>
                            <input type="text" class="form-control shadow bg-body" name = "fileId" id="profiel_code">
                        </div>
                    </div>
                    <div class="container mb-2 ">
                        <div class ="row">
                            <div>
                                <label for = "studentId" class = "form-label fw-bold"> Mã sinh viên </label>
                                <input type = "text" class = "form-control shadow bg-body" name = "studentId" id = "student_code">
                            </div>
                        </div>
                    </div>
                    <div class="container mb-2">
                            <div>
                                <label for="fname" class="form-label fw-bold">Họ và tên đệm</label>
                                <input type="text" class="form-control shadow bg-body rounded" name = "fname" id="firstname">     
                            </div>
                    </div>
                    <div class="container mb-2">
                        <div>
                            <label for="lname" class="form-label fw-bold">Tên</label>
                            <input type="text" class="form-control shadow bg-body rounded" name = "lname" id="lastname">
                        </div>
                    </div>
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label fw-bold">Giới tính</label>
                                <select class="form-control shadow bg-body rounded" name ="gender" id ="gender">
                                    <option value="" default selected>--Chọn giới tính--</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                                <span id="errorMsg"></span>
                            </div>
                            <div class="col-8">
                                <label for="birth" class="form-label fw-bold">Ngày sinh</label>
                                <input type ="date" id ="date_of_birth" name = "birth" class="form-control shadow bg-body rounded">
                            </div>
                        </div>
                    </div>
                    <div class="container mb-2">
                        <div>
                            <label for="birthplace" class="form-label fw-bold">Nơi sinh</label>
                            <input type ="text" id ="place_of_birth"  name = "birthPlace" class="form-control shadow bg-body rounded">                            
                        </div>
                    </div>
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="race" class="form-label fw-bold">Dân tộc</label>
                                <input type="text" name = "race" class="form-control shadow bg-body rounded" id="race">     
                            </div>
                            <div class="col">
                                <label for="religion" class="form-label fw-bold">Tôn giáo</label>
                                <input type="text"  name = "religion" class="form-control shadow bg-body rounded" id="religion">
                            </div>
                        </div>
                    </div>
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="cmnd" class="form-label fw-bold">Số CMND/CCCD</label>
                                <input type ="text" id ="identity_number"  name = "citizenId" class="form-control shadow bg-body rounded">
                            </div>
                            <div class="col">
                                <label for="noicap" class="form-label fw-bold">Nơi cấp</label>
                                <input type ="text" id ="noicap" name ="noicap" class="form-control shadow bg-body rounded">
                            </div>
                        </div>
                    </div>
                    <div class ="container mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="number" class="form-label fw-bold">Điện thoại</label>
                                <input type ="text" id ="phone" name = 'number' class="form-control shadow bg-body rounded">
                                <span id="errorMsgNumber"></span>
                            </div>
                            <div class="col">
                                <label for="email" class="form-label fw-bold">Email cá nhân</label>
                                <input type ="text" id ="email" name ="email" class="form-control shadow bg-body rounded">
                            </div>
                        </div>
                    </div>
                    <div class ="container mb-2">
                        <div>
                            <label for="address" class="form-label fw-bold">Địa chỉ liên hệ</label>
                            <input type ="text" id ="address" name ="address" class="form-control shadow bg-body rounded">
                        </div> 
                    </div>
                    <div class ="container mb-2">
                        <div>
                            <label class="form-label fw-bold">Ghi chú</label>
                            <textarea name="note" id="note" cols="30" rows="1" class="form-control shadow bg-body rounded"></textarea>
                        </div>
                    </div>
                    <div class ="container mb-2">
                        <div>
                            <label for ="status" class="form-label fw-bold">Trạng thái sinh viên</label>
                            <select name="studentStt" id="studentStt" class="form-control shadow bg-body rounded">
                                <option value="" default selected>--Chọn trạng thái--</option>
                                <option value="freshmen">Sinh viên năm nhất</option>
                                <option value="2nd">Sinh viên năm hai</option>
                                <option value="3rd">Sinh viên năm ba</option>
                                <option value="4th">Sinh viên năm tư</option>
                            </select>
                            <span id="errorMsgStatus"></span>
                        </div>
                    </div>

                                        <!-- SUBMIT FORM -->

                    <div class ="container mb-2 d-flex justify-content-center">
                        <div class="m-3">
                            <button type ="submit" class ="btn submitBtn btn-primary" name ="submit">Thêm mới</button>
                        </div>
                        <div class="m-3">
                            <button class ="btn cancelBtn btn-danger" onclick="document.location.href='list.php'">Hủy</button>
                        </div>               
                    </div>
                </form>
            </div>
        </fieldset>
    </div>
</body>
</html>