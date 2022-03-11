
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
                required:'<small><em style ="color:red">* Hãy điền email của bạn *</em></small>',
                email:'<small><em style ="color:red">* Hãy điền đúng định dạng email *</em></small>'
            },
            password:'<small><em style ="color:red">* Hãy điền mật khẩu *</em></small>'
        }
    })
    clearResponse();
});
    