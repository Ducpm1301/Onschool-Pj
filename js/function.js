$(document).ready(function(){
    function setCookie(cname, cvalue, exdays){
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    setCookie("jwt", "", 1);
    
    function showLoggedOutMenu(){
        // show login and sign up from navbar & hide logout button
        $("#login, #sign_up").show();
        $("#logout").hide();
    }
})