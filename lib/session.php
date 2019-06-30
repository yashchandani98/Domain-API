<?php session_start();
//$path = getcwd();
//$path = dirname(__FILE__);
$page_name=basename($_SERVER['PHP_SELF'],'.php');
if($page_name!='404'){
    if(isset($_SESSION['currentPage']) && !empty($_SESSION['currentPage'])){
        if($_SESSION['currentPage']!=$page_name){
            $_SESSION['lastPage']=$_SESSION['currentPage'];
        }
        if(isset($_SESSION['absolutePath']) && !empty($_SESSION['absolutePath'])){
            $arr=json_decode($_SESSION['absolutePath'],TRUE);
            $length=sizeof($arr);
            if($_SESSION['currentPage']!=$page_name){
                array_push($arr,$_SESSION['currentPage']);
                $_SESSION['absolutePath']=json_encode($arr);
            }
        }
        else{
            $arr=array();
            $_SESSION['absolutePath']=json_encode($arr);
        }
    }
    if(!isset($_SESSION['absolutePath'])){
        $arr=array();
        $_SESSION['absolutePath']=json_encode($arr);
    }
    $_SESSION['currentPage']=$page_name;
}
//echo $page_name;
?>