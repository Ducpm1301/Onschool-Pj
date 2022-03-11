$(document).ready(function () {
    // trigger when login form is submitted
    $(document).on('submit','#loginForm', function(){
    
        // get form data
        var login_form=$(this);
        var form_data=JSON.stringify(login_form.serializeObject());
    
        // submit form data to api
        $.ajax({
            url: "../api/login-api.php",
            type : "POST",
            contentType : 'application/json',
            headers: {
                Authorization: 'Bearer ' + $token
            },
            data : form_data,
            success : function(result){
        
                // store jwt to cookie
                setCookie("jwt", result.jwt, 1);
        
                // show home page & tell the user it was a successful login
                showHomePage();
            },
            error: function(xhr, err) {
                var err = JSON.parse(xhr.responseText);
                alert(err.Message);
            }
    });
    
        return false;
    });

    $.fn.serializeObject = function(){
 
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };    
});

