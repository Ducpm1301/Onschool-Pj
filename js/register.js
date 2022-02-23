$(document).ready(function(){

                                        //INFO TOGGLE

    $(".flip").click(function(){
        $(".panel").slideToggle("100000");
    });
    $(".flip").hover(function(){
        $(this).css({"text-decoration":"underline","cursor":"pointer"});
        }, function(){
        $(this).css("text-decoration", "none");
      });

                                        //FORM VALIDATION
                                        
    $(".formValidation").validate({
        rules:{
            studentId : 'required',
            fileId: 'required',
            fname: 'required',
            lname: 'required',
            birth: 'required',
            birthPlace: 'required',
            email: 'required',
        },
        messages: {
            studentId:'<small style ="color:red"><em>* Hãy điền mã sinh viên vào ô trống *</em></small>',
            fileId:'<small style ="color:red"><em>* Hãy điền mã hồ sơ vào ô trống *</em></small>',
            fname: '<small style ="color:red"><em>* Hãy điền họ và tên đệm *</em></small>',
            lname:'<small style ="color:red"><em>* Hãy điền tên *</em></small>',
            birth:'<small style ="color:red"><em>* Hãy chọn ngày tháng năm sinh *</em></small>',
            birthPlace:'<small style ="color:red"><em>* Hãy điền nơi sinh *</em></small>',
            email: '<small style ="color:red"><em>* Hãy điền email *</em></small>',
        }
    })

                                //Gender select box validation

    $(".submitBtn").click(function(){
        if ($('#gender').val() === ""){
            $('#errorMsg').html("<small style ='color:red'><em>* Hãy chọn giới tính của bạn *</em></small>");
        }
        else {
            $('#errorMsg').text('');
        }
    })
});