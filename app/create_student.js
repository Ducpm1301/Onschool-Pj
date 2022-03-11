$(document).ready(function(){
    $("#formValidation").on("submit",function(){
        var form_data = JSON.stringify($(this).serializeObject());

        // submit form data to api
        $.ajax({
            url: "http://localhost/api/students/create.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
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