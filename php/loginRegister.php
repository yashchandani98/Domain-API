<?php session_start(); require('../lib/console-config.php');require('../mail/PHPMailer-master/PHPMailerAutoload.php');
if(isset($_REQUEST['action']) && $_REQUEST['action']=='signup'){
    $org_name=NULL;
    if($_POST['user_type']==2){
        $org_name=$_POST['org_name'];
    }
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($CONN,"INSERT INTO `tbl_user` SET `name`='$_POST[name]',`email_id`='$_POST[email]',`profession`='$_POST[user_type]',`org_name`='$org_name',`pwd`='$pwd',`address`='$_POST[address]',`city`='$_POST[city]',`country`='$_POST[country]',`postal`='$_POST[postal]'") or die(mysqli_query($CONN));
    $userId=mysqli_insert_id($CONN);
 $mail = new PHPMailer();
 $mail ->IsSmtp();
 $mail ->SMTPDebug = 1;
 $mail ->SMTPAuth = true;
 $mail ->SMTPSecure = 'ssl';
 $mail ->Host = $MAILHOSTNAME;
 $mail ->Port = 465; // or 587
 $mail ->IsHTML(true);
$mail ->Username =$MAILUSERNAME;
$mail ->Password=$MAILPASSWORD;
 $mail ->SetFrom($MAILUSERNAME);
 $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
 $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
 $otp=mt_rand(1000,999999);
 $tokenAuth=sha1($otp);
 $url=$CONSOLEURL."php/operation?action=activateAccount&tokenAuth=".$tokenAuth."&account=".$userId;
 $message = "<div style='float:center;'>
 <a href='{$url}' target='_blank'>
 Activate my Account</a>
 </div>";
 $mail ->Subject = "E-Mail verification";
 $mail ->Body = $message;
 $mailto=$_POST['email'];
 $mail ->AddAddress($mailto);
 if($mail->Send())
 {
    mysqli_query($CONN,"INSERT INTO `tbl_email_tokens` SET `fk_id`='$userId',`Tokens`='$tokenAuth'");
    echo "##1";
 }
 else
 {
     echo "##0";
 }
    exit();
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='update'){
    $org_name=NULL;
    if(!empty($_POST['orgName'])){
        $org_name=$_POST['orgName'];
    }
    mysqli_query($CONN,"UPDATE `tbl_user` SET `name`='$_POST[name]',`org_name`='$org_name',`address`='$_POST[address]',`city`='$_POST[city]',`country`='$_POST[country]',`postal`='$_POST[postal]' WHERE `pk_id`='$_POST[userId]'") or die(mysqli_query($CONN));
    echo "##1";
    exit();
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='login'){
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $user_query=mysqli_query($CONN,"SELECT * FROM `tbl_user` WHERE `email_id`='$email' AND `status`!='0'");
    $user_rows=mysqli_fetch_assoc($user_query);
    if(mysqli_num_rows($user_query)==1){
        if (password_verify($pwd,$user_rows['pwd'])){
            if($user_rows['status']==1){
                $_SESSION['user_mail']=$email;
                $_SESSION['login_user']=1;
				$_SESSION['user_id']=$user_rows['pk_id'];
                if($_REQUEST['remember']==1){
                    setcookie("user_mail",$email,time()+10*365*24*60*60);
                    setcookie("login_user",1,time()+10*365*24*60*60);
                }
                else{
                    setcookie("user_mail",$email);
                    setcookie("login_user",1);
                }
                echo "##1";
                exit();
            }
            elseif($user_rows['status']==2){
                echo "##2";
                exit();
            }
        }
        else{
            echo "##3";
            exit();
        }
    }
    else{
        echo "##4";
        exit();
    }
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='sendVerificationLink'){
    $email=$_POST['email'];
    $user_query=mysqli_query($CONN,"SELECT * FROM `tbl_user` WHERE `email_id`='$email' AND `status`!='0'");
    $user_rows=mysqli_fetch_assoc($user_query);
    if(mysqli_num_rows($user_query)==1){
        if($user_rows['status']==2){
            //Send confirmation email
            echo "##1";
            exit();
        }
        else{
            //Already activated email
            echo "##2";
            exit();
        }
    }
    else{
        echo "##3";
        exit();
    }
}
?>