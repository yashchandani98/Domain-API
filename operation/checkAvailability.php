<?php
require_once('../lib/console-config.php');
$operation="checkAvailability";
$operationId=0;
if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_hosts)) {
    header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
    exit;
}
else{
    //$ip=$_SERVER["REMOTE_ADDR"];
    $ip=gethostbyname(trim(exec("hostname")));
    $arrOutput=array();
    $domainAvailable=0;
    $operationProceed=0;
    $msgResponse="";
    $requestNo=0;
    $responseNo=0;
    $apiCalls=0;
    $apiValid=0;
    if(isset($_REQUEST['apiKey']) && !empty($_REQUEST['apiKey'])){
        $apiKey=$_REQUEST['apiKey'];
        $result_query=mysqli_query($CONN,"SELECT `tbl_user_plans`.*,`tbl_plans`.*,`tbl_apis`.* FROM `tbl_apis` INNER JOIN `tbl_plans` ON `tbl_apis`.`plan_id`=`tbl_plans`.`pk_id` INNER JOIN `tbl_user_plans` ON `tbl_user_plans`.`pk_id`=`tbl_apis`.`fk_id`  WHERE `api`='$apiKey' AND `tbl_apis`.`status`='1'");
        if(mysqli_num_rows($result_query)==1){
            $result_api=mysqli_fetch_assoc($result_query);
            $requestNo=$result_api['request_response_total_no']+1;
            $responseNo=$result_api['request_response_total_no']+1;
            $apiCalls=$result_api['no_calls'];
            $apiId=$result_api['pk_id'];
            if($result_api['no_calls']<=$result_api['Api_calls']){
                //echo date('Y-m-d H:i:s')."|".date('Y-m-d H:i:s',strtotime($result_api['renewal_date']));
                if(date('Y-m-d H:i:s')<date('Y-m-d H:i:s',strtotime($result_api['renewal_date']))){
                    if(isset($_REQUEST['domainName']) && !empty($_REQUEST['domainName'])){
                        if(isset($_REQUEST['responseFormat']) && $_REQUEST['responseFormat']=='json' || $_REQUEST['responseFormat']=='xml'){
                            $operationProceed=1;
                        }
                        else{
                            $operationProceed=0;
                            $apiValid=1;
                            $msgResponse="Invalid Response format! Please refer to our documentation for help";    
                        }
                    }
                    else{
                        $operationProceed=0;
                        $apiValid=1;
                        $msgResponse="Invalid Domain Name! Please refer to our documentation for help";
                    }
                }
                else{
                    $operationProceed=0;
                    $apiValid=1;
                    $msgResponse="API Membership Expired! Please refer to our documentation for help";
                }
            }
            else{
                $operationProceed=0;
                $apiValid=1;
                $msgResponse="Number of API calls Exceeded! Purchase membership for API calls";
            }
        }
        else{
            $operationProceed=0;
            $apiValid=0;
            $msgResponse="Invalid API key! Please visit our API Manager section for valid API";
        }
    }else{
        $operationProceed=0;
        $apiValid=0;
        $msgResponse="Invalid API call! No API provided";
    }
    if($operationProceed==1){
        $domainName=$_REQUEST['domainName'];
        ++$apiCalls;
        $url="https://www.namesilo.com/api/checkRegisterAvailability?version=1&type=xml&key={$NAMESILOAPI}&domains={$domainName}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        $result = curl_exec($ch); 
        //$content = file_get_contents($url);
        $xml = new SimpleXMLElement($result);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        if (array_key_exists("reply",$array))
        {
            if(isset($array['reply']['available'])){
                $domainAvailable = 1;
                $msgResponse=1;
            }
            else{
                $domainAvailable = 0;
                $msgResponse=0;
            }
        }
        mysqli_query($CONN,"UPDATE `tbl_apis` SET `no_calls`='$apiCalls' WHERE `pk_id`='$apiId'");
    }
    if(isset($_REQUEST['responseFormat']) && $_REQUEST['responseFormat']=='json'){
        $arrOutput['request']['requestedIpAddress']=$ip;
        $arrOutput['request']['apiKey']=!empty($_REQUEST['apiKey'])?$_REQUEST['apiKey']:"";
        $arrOutput['request']['operation']=$operation;
        $arrOutput['request']['domainName']=!empty($_REQUEST['domainName'])?$_REQUEST['domainName']:"";
        $arrOutput['request']['responseFormat']=!empty($_REQUEST['responseFormat'])?$_REQUEST['responseFormat']:"";
        if($operationProceed==1){
            $arrOutput['response']['reply']="Success";
            $arrOutput['response']['domainAvailable']=$domainAvailable;
        }
        else{
        $arrOutput['response']['reply']="Error";
        $arrOutput['response']['errorInfo']=$msgResponse;
        }
        $arrOutput['response']['requestNo']=$requestNo;
        $arrOutput['response']['responseNo']=$responseNo;
        $arrOutput['response']['apiCalls']=$apiCalls;
        echo "<pre>".json_encode($arrOutput,JSON_PRETTY_PRINT)."</pre>";
    }
    else if(isset($_REQUEST['responseFormat']) && $_REQUEST['responseFormat']=='xml'){
        header('Content-type: text/xml');
        $number=rand(10,1000000000);
        $fileName=$number.".xml";
        $myfile = fopen("xml/$fileName", "w") or die("Unable to open file!");
        if($operationProceed==1){
            $txt = '<?xml version="1.0" encoding="utf-8"?>

        <domainApi status = "ok">
        
                <request request_no = "'.$requestNo.'">
        
                    <requestedIpAddress>'.$ip.'</requestedIpAddress>
        
                    <apiKey>'.$_REQUEST['apiKey'].'</apiKey>
                    
                    <operation>'.$operation.'</operation>

                    <domainName>'.$_REQUEST['domainName'].'</domainName>

                    <responseFormat>'.$_REQUEST['responseFormat'].'</responseFormat>
        
                </request>
        
                <response response_no = "'.$responseNo.'">
        
                    <reply>success</reply>

                    <apiCalls>'.$apiCalls.'</apiCalls>
        
                    <domainAvailable name="'.$_REQUEST['domainName'].'">'.$domainAvailable.'</domainAvailable>
        
                </response>
        
        </domainApi>';
        }
        else{
            if(isset($_REQUEST['apiKey']) && !empty($_REQUEST['apiKey'])){
                $apiKey=$_REQUEST['apiKey'];
            }
            else{
                $apiKey="Not Provided";
            }
            if(isset($_REQUEST['domainName']) && !empty($_REQUEST['domainName'])){
                $domainName=$_REQUEST['domainName'];
            }
            else{
                $domainName="Not Provided";
            }
            $txt = '<?xml version="1.0" encoding="utf-8"?>

        <domainApi status = "ok">
        
                <request request_no = "'.$requestNo.'">
        
                    <requestedIpAddress>'.$ip.'</requestedIpAddress>
        
                    <apiKey>'.$apiKey.'</apiKey>
                    
                    <operation>'.$operation.'</operation>

                    <domainName>'.$domainName.'</domainName>

                    <responseFormat>'.$_REQUEST['responseFormat'].'</responseFormat>
        
                </request>
        
                <response response_no = "'.$responseNo.'">
        
                    <reply>Error</reply>

                    <apiCalls>'.$apiCalls.'</apiCalls>
        
                    <errorInfo name="'.$_REQUEST['domainName'].'">'.$msgResponse.'</errorInfo>
        
                </response>
        
        </domainApi>';
        }
        fwrite($myfile, $txt);
        fclose($myfile);
        $file = file_get_contents('xml/'.$fileName);
        echo $file;
    }
    else{
        $arrOutput=array();
        $arrOutput['error']="Invalid API responseFormat specified! Please refer our documentation for help";
        echo "<pre>".json_encode($arrOutput,JSON_PRETTY_PRINT)."</pre>";
    }
    //echo $msgResponse;
    if($operationProceed==1){
        mysqli_query($CONN,"UPDATE `tbl_apis` SET `request_response_total_no`='$responseNo' WHERE `pk_id`='$apiId'") or die(mysqli_error($CONN));
        if(isset($_REQUEST['domainName']) && !empty($_REQUEST['domainName'])){
            $domainName=$_REQUEST['domainName'];
        }
        else{
            $domainName="No Domain provided";
        }
        mysqli_query($CONN,"INSERT INTO `tbl_apis_history` SET `fk_id`='$apiId',`operation_id`='$operationId',`response`='$msgResponse',`domainName`='$domainName',`status`='$operationProceed',`ip`='$ip'") or die(mysqli_error($CONN));
    }
}
?>