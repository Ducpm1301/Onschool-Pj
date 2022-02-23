
$(document).ready(function(){    
    $("#loginForm").validate({
        rules:{
            email:{
                required: true,
                email: true
            },
            password: "required"
        },
        messages:{
            email:{
                required:'<small><em style ="color:red">* Please enter your email *</em></small>',
                email:'<small><em style ="color:red">* Please enter a valid email *</em></small>'
            },
            password:'<small><em style ="color:red">* Please enter your password *</em></small>'
        }
    })
    $("#btnSubmit").click(function(){
        $("input")
    })
});
    