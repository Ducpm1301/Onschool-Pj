
$(document).ready(function(){    

                                    //LOGIN VALIDATION
                                    
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

                    //KEEP BUTTON UNSUBMIT WHEN INPUT FIELD IS EMPTY

    $("#btnSubmit").click(function(){
        $("input")
    })
});
    