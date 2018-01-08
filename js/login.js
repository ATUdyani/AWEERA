$(function() {

    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                var formArray = [];
                formArray.push($lg_username);
                formArray.push($lg_password);
                var jsonString = JSON.stringify(formArray);
                $.ajax({
                    url:"controller/login.php", //the page containing php script
                    type: "POST", //request type
                    data: {data : jsonString},
                    cache: false,
                    dataType: 'text',
                    success:function(result){
                        var recievedResult = $.trim(result);
                        if (recievedResult =="error"){
                            msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                        }
                        else{
                            window.location.href = result;
                        }
                    }
                });

                /*if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }*/
                return false;
                break;
            case "lost-form":
                var ls_email=$('#lost_email').val();
                $('#btn_lost').prop("disabled",true);
                msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-play", "pending . . . ");
                $.ajax({
                    url:"controller/lost-password-handler.php", //the page containing php script
                    type: "POST", //request type
                    data: { ls_email: ls_email},
                    cache: false,
                    dataType: 'json',
                    success:function(result){
                        $('#btn_lost').prop("disabled",false);
                        var recievedResult = result[0];
                        if (recievedResult =="failure"){
                            msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", result[1]);
                        }
                        else{
                            msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", result[1]);
                            $('#lost_email').val("");
                        }
                    }
                });
                /*if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }*/
                return false;
                break;
            case "register-form":
                var $rg_first_name=$('#first_name').val();
                var $rg_last_name=$('#last_name').val();
                var $rg_contact_number=$('#contact_number').val();
                var $rg_address=$('#address').val();
                var $rg_email=$('#register_email').val();
                var $rg_gender=$('#register_gender').val();
                var $rg_password=$('#register_password').val();
                var $rg_cpassword=$('#register_cpassword').val();
                var formArray = [];
                formArray.push($rg_first_name,$rg_last_name,$rg_contact_number,$rg_address,$rg_email,$rg_gender,$rg_password,$rg_cpassword);

                var jsonString = JSON.stringify(formArray);
                $.ajax({
                    url:"controller/register.php", //the page containing php script
                    type: "POST", //request type
                    data: {data : jsonString},
                    cache: false,
                    dataType: 'json',
                    success:function(result){
                        var recievedResult = result[0];
                        if (recievedResult =="failure"){
                            //alert(result[1]);
                            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", result[1]);
                        }

                        if (recievedResult =="success"){
                            // window.location.href = result;
                            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", result[1]);
                            $('#first_name').val("");
                            $('#last_name').val("");
                            $('#contact_number').val("");
                            $('#address').val("");
                            $('#register_email').val("");
                            $('#register_gender').val("Male");
                            $('#register_password').val("");
                            $('#register_cpassword').val("");
                            $('#message').html("");

                            //alert("success");
                        }
                    }
                });

                return false;
                break;
            default:
                return false;
        }
        return false;
    });

    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }

    //password matching-------------------------------------------------------------------------------

    $('#register_cpassword').on('keyup', function () {
        if($(this).val() == ' '){
            $('#message').html("");
        }
        if ($(this).val() == $('#register_password').val()) {
            //document.getElementById('takemein').disabled=false;
            $('#message').html('Password Match').css('color', 'green');


        }
        else {
            //document.getElementById('takemein').disabled=true;
            $('#message').html('Password does not match. Please Re-Enter!').css('color', 'red');
            msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove","Type your email and password.","Register an account.");

        }
    });

    //---------------------------------------------------------------------------------------------------
});

// function to direct the user to user-home from main home page
function directUser(user_id){
    alert(user_id);
}