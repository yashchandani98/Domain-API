var pwd_strength=0;
var pwd_confirm=0;
$(document).ready(function(){
    $("#user_type").on('change',function(){
        if($(this).val()==2){
            $("#org_name_section").show();
            $("#org_name").attr('required',true);
        }
        else{
            $("#org_name_section").hide();
            $("#org_name").attr('required',false);
        }
    });
    $("#signupForm").on('submit',function(e){
        e.preventDefault();
        if(pwd_strength==1 && pwd_confirm==1 && $("#user_type").val()!=0){
            if($("#customCheckRegister").is(":checked")){
                $(".signupButton").text('Working on it...');
                $(".signupButton").attr('disabled',true);
                $(".signupButton").css('cursor','not-allowed');
                $.post($("#signupForm").attr("action"),$("#signupForm").serialize(),function(data){
                    $(".signupButton").text('Create account');
                    $(".signupButton").attr('disabled',false);
                    $(".signupButton").css('cursor','pointer');
                    $("#signupForm").append(data);
                    alert(data);
                    if(data=="##1"){
                        $(".alert-error").fadeOut();
                        $(".alert-success-signup").fadeIn();
                        setTimeout(() => {
                            $(".alert-success-signup").fadeOut();
                        },2000);
                        $("#signupForm")[0].reset();
                        $(".password-confirm").addClass('hidden');
                        $(".password-strength").addClass('hidden');
                    }
                    else{
                        //$(".alert-error").fadeOut();
                        $(".alert-error-signup-submit").fadeIn();
                        setTimeout(() => {
                            $(".alert-error-signup-submit").fadeOut();
                        },2000);
                    }
                });
            }
            else{
                $(".alert-success-signup").fadeOut();
                $(".alert-error").fadeIn();
                setTimeout(() => {
                    $(".alert-error").fadeOut();
                },2000);
            }   
        }
        else{
            if($("#user_type").val()==0){
                $("#user_type").focus();
                $(".alert-error-org").fadeIn();
                setTimeout(() => {
                    $(".alert-error-org").fadeOut();
                }, 2000);
            }
        }
    });
    $("#password").on('input',function(){
        if($(this).val().length>0){
            $(".password-strength").removeClass('hidden');
            if(checkPasswordStrength($(this).val())){
                pwd_strength=1;
            }
            else{
                pwd_strength=0;
            }
        }
        else{
            $(".password-strength").addClass('hidden');
        }
        if($("#password_confirmation").val().length>0 && $(this).val().length>0){
            $(".password-confirm").removeClass('hidden');
            if(checkPasswordConfirm($(this).val(),$("#password_confirmation").val())){
                pwd_confirm=1 
            }
            else{
                pwd_confirm=0;
            }
        }
        else{
            $(".password-confirm").addClass('hidden');
        }
    });
    $("#password_confirmation").on('input',function(){
        if($(this).val().length>0 && $("#password").val().length>0){
            $(".password-confirm").removeClass('hidden');
            if(checkPasswordConfirm($(this).val(),$("#password").val())){
                pwd_confirm=1 
            }
            else{
                pwd_confirm=0;
            }
        }
        else{
            $(".password-confirm").addClass('hidden');
        }
    });
    $("#loginForm").on('submit',function(e){
        var remember=0;
        e.preventDefault();
        $(".loginButton").text('Working on it...');
        $(".loginButton").attr('disabled',true);
        $(".loginButton").css('cursor','not-allowed');
        if($("#remember").is(":checked")){
            remember=1;
        }
        $.post($(this).attr('action')+"&remember="+remember,$(this).serialize(),function(data){
            $(".loginButton").text('Sign in');
            $(".loginButton").attr('disabled',false);
            $(".loginButton").css('cursor','pointer');
            if(data=="##1"){
                location.replace("dashboard");
            }
            else{
                if(data=="##2"){
                    $("#error").text(" Account Unverified.");
                    $("#link_verification").removeClass('hidden');
                }
                else if(data=="##4"){
                    $("#error").text(" Account doesn't exist.");
                    $("#link_verification").addClass('hidden');
                }
                else{
                    $("#link_verification").hide();
                }
                $(".alert-error-auth").fadeIn();
                setTimeout(() => {
                    $(".alert-error-auth").fadeOut();
                },2000);
            }
        });
    });
    $("#resetPwdForm").on('submit',function(e){
        e.preventDefault();
        $(".pwdResetBtn").text('Working on it...');
        $(".pwdResetBtn").attr('disabled',true);
        $(".pwdResetBtn").css('cursor','not-allowed');
        $.post($(this).attr('action'),$(this).serialize(),function(data){
            $(".pwdResetBtn").text('Send Password Reset Link');
            $(".pwdResetBtn").attr('disabled',false);
            $(".pwdResetBtn").css('cursor','pointer');
            if(data=="##1"){
                $(".pwdResetBtn").text('Resend Link?');
                $(".alert-success-auth").fadeIn();
                setTimeout(() => {
                    $(".alert-success-auth").fadeOut();
                },2000);
            }
            else{
                $(".alert-error-auth").fadeIn();
                setTimeout(() => {
                    $(".alert-error-auth").fadeOut();
                },2000);
            }
        });
    });
});
function sendVerificationLink(){
    $.post("php/loginRegister.php?action=sendVerificationLink",{email:$("#email").val()},function(data){
        if(data=="##1"){
            $(".alert-success-link").fadeIn();
                setTimeout(() => {
                    $(".alert-success-link").fadeOut();
                },2000);
        }
        else if(data=="##2"){
            $(".alert-error-auth").fadeIn();
            $("#error").text("This Account is already verified.");
                setTimeout(() => {
                    $(".alert-error-auth").fadeOut();
                    $("#error").text("Authentication Failed.");
                },2000);
        }
        else if(data=="##3"){
            $(".alert-error-auth").fadeIn();
            $("#error").text("Account doesn't exist.");
                setTimeout(() => {
                    $(".alert-error-auth").fadeOut();
                    $("#error").text("Authentication Failed.");
                },2000);
        }
    });
}
function password_operation(){
    var type=$("#passwordLogin").attr('type');
    if(type=="password"){
        $("#passwordLogin").attr('type','text');
        $(".pwd-visiblity").removeClass('fa-eye').addClass('fa-eye-slash');
        $(".pwd-section").attr('title','Hide Password');
    }
    else{
        $("#passwordLogin").attr('type','password');
        $(".pwd-visiblity").addClass('fa-eye').removeClass('fa-eye-slash');
        $(".pwd-section").attr('title','Show Password');
    }
}
function checkPasswordConfirm(cnfm_pwd,pwd){
    if(cnfm_pwd==pwd){
        $(".pwd-alert-confirm").removeClass('text-warning').addClass('text-success').text("Passwords matched");
        return true;
    }
    else{
        $(".pwd-alert-confirm").removeClass('text-success').addClass('text-warning').text("Passwords donot match");
        return false;
    }
}
function checkPasswordStrength(pwd) {
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if(pwd.length<6) {
    $('.pwd-alert').removeClass('text-success').removeClass('text-info');
    $('.pwd-alert').addClass('text-warning');
    $('.pwd-alert').html("Weak (should be atleast 6 characters.)");
    return false;
    } 
    else {
        if(pwd.match(number) && pwd.match(alphabets) && pwd.match(special_characters)) {            
            $('.pwd-alert').removeClass('text-info').removeClass('text-warning');
            $('.pwd-alert').addClass('text-success');
            $('.pwd-alert').html("Strong");
        } 
        else {
            $('.pwd-alert').removeClass('text-success').removeClass('text-warning');
            $('.pwd-alert').addClass('text-info');
            $('.pwd-alert').html("Medium (should include alphabets, numbers and special characters.)");
        }
        return true;
    }
}
    