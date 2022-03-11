<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../fontawesome/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../jquery/jquery.js"></script>
    <script src ="../jquery/jqueryValidationPlugin.js"></script>
    <script src ="../js/login.js"></script>
    <script src ="../js/function.js"></script>
</head>
<body class ="d-flex justify-content-center align-items-center" class ="bg-image" style ="background-image:url(../img/1.png);height:100%;background-repeat: no-repeat;background-size: cover;">
    <div class ="container col-md-4 col-md-offset-4 pt-5">
        <fieldset class ="bg-white">
            <form class ="m-3 text-center" id ="loginForm" name ="formValidation" action="" method ="post">
                <h3 class="text-center pb-4">Login to your account</h3>
                <span id="response"></span>
                <div class="container pb-4">
                    <div class="form-group pb-4 row">
                        <div class="col">  
                            <input type="email" name ="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="&#xF002; Enter your email" style="font-family:Arial, FontAwesome" value ="<?php echo $email ?>">
                        </div>
                    </div>
                </div>
                <div class="container pb-4">
                    <div class="form-group pb-4 row">
                        <div class="col">
                            <input type="password" name ="password" class="form-control" id="password" placeholder="&#xf084; Enter your email" style="font-family:Arial, FontAwesome" value ="<?php echo $_POST['password'] ?>">
                            <span id="error"></span>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between pb-4">
                    <div>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <a href ="#" class ="text-right">Forgot your password?</a>
                </div>
                <div class ="text-center mb-3">
                    <button type="button" class="btn btn-primary" id ="btnSubmit" name = "submit">Let's go</button>
                </div>
            </form>
        </fieldset>
    </div>
    <script>
        $(document).ready(function(){
            $("#btnSubmit").on("click", function(){
 
                // get form data
                var login_form=$("#loginForm");
                var form_data=JSON.stringify(login_form.serialize());
                if(login_form !== ""){
                    // submit form data to api
                    $.ajax({
                        url: "api/login-api.php",
                        type : "POST",
                        contentType : 'application/json',
                        data : form_data,
                        success : function(result){
                    
                            // store jwt to cookie
                            setCookie("jwt", result.jwt, 1);
                    
                            // show home page & tell the user it was a successful login
                            showHomePage();
                            $('#response').html("<div class='alert alert-success'>Successful login.</div>");
                    
                        },
                        error: function(xhr, resp, text){
                        // on error, tell the user login has failed & empty the input boxes
                        $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
                        login_form.find('input').val('');
                        }
                    });
                }
                return false;
                });
        })
    </script>
</body>
</html>