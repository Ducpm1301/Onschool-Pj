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
            race: 'required',
            religion: 'required',
            citizenId: 'required',
            noicap: 'required',
            email: {
                required: true,
                email: true
            },
            address:'true'
        },
        messages: {
            studentId:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            fileId:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            fname: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            lname:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            birth:'<small style ="color:red"><em>* Hãy chọn ngày tháng năm sinh *</em></small>',
            birthPlace:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            race:  '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            religion: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            citizenId: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            noicap: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
            email:{
                required: '<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>',
                email:  '<small style ="color:red"><em>* Hãy điền đúng định dạng email *</em></small>',
            },
            address:'<small style ="color:red"><em>* Hãy điền thông tin vào ô trống *</em></small>'
        },
    })

                                //Gender select box validation

    $(".submitBtn").click(function(){
        if ($('#gender').val() === ""){
            $('#errorMsg').html("<small style ='color:red'><em>* Hãy chọn giới tính của bạn *</em></small>");
        }else {
                $('#errorMsg').text('');
        }
    },function(){
        if ($('#status').val() === ""){
            $('#errorMsg2').html("<small style ='color:red'><em>* Hãy chọn trạng thái*</em></small>");
        }else {
                $('#errorMsg2').text('');
        }
    });
})
