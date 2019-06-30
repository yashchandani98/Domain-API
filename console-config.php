<?php
// Author Name Yash Chandani (+91-7999152017) yashchandani98.yc@gmail.com | contact@yashchandani.tk
//require_once('mail/PHPMailer-master/PHPMailerAutoload.php');
$CONSOLEURL="http://console.domainapi.ml/";
$MAINBASEURL="http://domainapi.ml/";
$DOCSURL="http://localhost/domain_docs"; // Replace to http://docs.domainapi.ml/
$APIURL="http://api.domainapi.ml"; // Replace to http://api.domainapi.ml/
$allowed_hosts = array('localhost', 'api.domainapi.ml');
$NAMESILOAPI="edf25c7331b89d2e7678";
$MODE="PRODUCTION";//PRODUCTION OR TESTING OR DEVELOPMENT
if($MODE=="DEVELOPMENT"){
    error_reporting(E_ALL);
}
else if($MODE=="TESTING"){
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}
else if($MODE=="PRODUCTION"){
    error_reporting(0);
}
$CONN=mysqli_connect("localhost","u972541460_yash1","@Yash12@","u972541460_yash1");
$MAILUSERNAME="noreply@domainapi.ml";
$MAILPASSWORD="@Yash12@";
$MAILHOSTNAME="smtp.hostinger.in";
// $MAILUSERNAME="yashchandani98.yc@gmail.com";
// $MAILPASSWORD="Reliance@1101998";
// $MAILHOSTNAME="smtp.gmail.com";
?>