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
            fname:{
                required:true,
                lettersonly:true
            },
            lname:{
                required:true,
                lettersonly:true
            },
            birth: 'required',
            birthPlace: 'required',
            race: 'required',
            religion: 'required',
            citizenId: {
                required:true,
                number:true,
                minlength:9,
                maxlength:12
            },
            noicap: 'required',
            number:{
                required:true,
                phoneVN:true
            },
            email: {
                required: true,
                email: true
            },
            address:'required'
        },
        messages: {
            studentId:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            fileId:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            fname:{
                required:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                lettersonly:'<small style ="color:red"><em>* Hãy nhập đúng định dạng tên *</em></small>'
            },
            lname:{
                required:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                lettersonly:'<small style ="color:red"><em>* Hãy nhập đúng định dạng tên *</em></small>'
            },
            birth:'<small style ="color:red"><em>* Hãy chọn ngày tháng năm sinh *</em></small>',
            birthPlace:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            race:  '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            religion: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            citizenId:{
                required: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                number: '<small style ="color:red"><em>* Hãy điền đúng định dạng CMND/CCCD *</em></small>',
                minlength: '<small style ="color:red"><em>* Số CMND/CCCD phải bao gồm ít nhất 9 số và nhiều nhất là 12 số *</em></small>',
                maxlength: '<small style ="color:red"><em>* Số CMND/CCCD phải bao gồm ít nhất 9 số và nhiều nhất là 12 số *</em></small>',
            },
            noicap: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            number:{
                required: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                phoneVN: '<small style ="color:red"><em>* Hãy điền đúng định dạng số điện thoại *</em></small>', 
            },
            email:{
                required: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                email:  '<small style ="color:red"><em>* Hãy điền đúng định dạng email *</em></small>',
            },
            address:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>'
        },
    });

                                //Gender and student status select box validation

    $(".submitBtn").click(function(){
        if ($('#gender').val() === "" && $('#studentStt').val() === ""){
            $('#errorMsg').html("<small style ='color:red'><em>* Hãy chọn giới tính của bạn *</em></small>");
            $('#errorMsgStatus').html("<small style ='color:red'><em>* Hãy chọn trạng thái *</em></small>");
        }else {
                $('#errorMsg').text('');
                $('#errorMsgStatus').text('');
        }
    })

                                    //ADD NEW METHOD
    jQuery.validator.addMethod("lettersonly", function(value, element) { //CHỈ NHẬP CHỮ CÁI
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });

    jQuery.validator.addMethod('phoneVN', function(phone_number, element) {
        return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(\(?(0|\+84)[2|3|8|9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
    })
})
