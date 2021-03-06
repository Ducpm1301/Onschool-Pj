$(document).ready(function(){
    // set Cookie
    function setCookie(cname, cvalue, exdays){
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    setCookie("jwt", "", 1);

    // show home page
    function showHomePage(){
    
        // validate jwt to verify access
        var jwt = getCookie('jwt');
        $.post("../api/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
            $(location).attr(
                "href",
                "../php/list.php"
              );
        })
    }
    showHomePage();
    
    function getCookie(cname){
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' '){
                c = c.substring(1);
            }
    
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    
    // showLoggedInMenu() will be here

    // get or read Cookie
    

})