$(document).ready(function(){
    $(".formValidation").on("submit",function(e){
        e.preventDefault();
        let profile_code = $("#profile_code").val();
        let student_code = $("#student_code").val();
        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let gender = $("#gender").val();
        let date_of_birth = $("#date_of_birth").val();
        let place_of_birth = $("#place_of_birth").val();
        let race = $("#race").val();
        let religion = $("#religion").val();
        let phone = $("#phone").val();
        let email = $("#email").val();
        let noicap = $("#noicap").val();
        let identity_number = $("#identity_number").val();
        let address = $("#address").val();
        let studentStt = $("#studentStt").val();
        let note = $("#note").val();

        let form_data = 
        [profile_code,student_code,firstname,lastname,gender,date_of_birth,place_of_birth,race,religion,phone,email,noicap,identity_number,address,studentStt,note]
        // submit form data to api
        $.ajax({
            url: "http://localhost/OnschoolPj/api/students/create.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function() {
                // student's info was created, go back to students list
                showProducts();
            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });
    })
})