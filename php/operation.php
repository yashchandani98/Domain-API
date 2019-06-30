<?php session_start();require_once('../lib/console-config.php');
if(isset($_POST['operation']) && $_POST['operation']=="planActivation"){
$planId=$_POST['planId'];
$user=$_SESSION['user_mail'];
$userId=$_SESSION['user_id'];
$currentDate=date('Y-m-d H:i:s');
$renewalDate=date('Y-m-d H:i:s',strtotime("+1 years"));
//$plan_query=mysqli_query($CONN,"SELECT * FROM `tbl_user_plans` WHERE `fk_id`='$userId' AND `status`='1'");
mysqli_query($CONN,"UPDATE `tbl_user_plans` SET `status`='0' WHERE `fk_id`='$userId' AND `status`='1'") or die(mysqli_error($CONN));
mysqli_query($CONN,"INSERT INTO `tbl_user_plans` SET `fk_id`='$userId',`plan_id`='$planId',`renewal_date`='$renewalDate'") or die(mysqli_error($CONN));
echo "##1";
exit();
}
if(isset($_POST['operation']) && $_POST['operation']=="generateApi"){
    $userId=$_SESSION['user_id'];
    $planId=$_POST['planId'];
    $currentDate=date('Y-m-d H:i:s');
    $renewalDate=date('Y-m-d H:i:s',strtotime("+1 years"));
    $apiKey=md5($currentDate);
    $plan_query=mysqli_query($CONN,"SELECT * FROM `tbl_user_plans` WHERE `fk_id`='$userId' AND `plan_id`='$planId' AND `status`='1'");
    $plan_rows=mysqli_fetch_assoc($plan_query);
    $pkId=$plan_rows['pk_id'];
    mysqli_query($CONN,"INSERT INTO `tbl_apis` SET `plan_id`='$planId' ,`fk_id`='$pkId',`api`='$apiKey',`generated_date`='$currentDate'") or die(mysqli_error($CONN));
    $lastId=mysqli_insert_id($CONN);
    mysqli_query($CONN,"UPDATE `tbl_user_plans` SET `current_api_id`='$userId' WHERE `pk_id`='$pkId'") or die(mysqli_error($CONN));
    echo "##1";
    exit();
    }
?>