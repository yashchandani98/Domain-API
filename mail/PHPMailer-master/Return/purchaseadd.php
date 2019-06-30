<html>
<head>
<!---<script src="jq.js"></script>
<script src="bootstrap.min.js"></script>
<link href="bootstrap.min.css" rel="stylesheet">-->
<style>
#text1{
	width:80px;
}

#text2{
	width:80px;
}
</style>
<script>

function myFunction(browser) {
	
	var t1= document.getElementById("text").value;
	var y= (t1*(browser/2))/100;
	document.getElementById("text1").value = y;
	document.getElementById("text2").value = y;
	document.getElementById("p1").innerHTML="gst "+ (browser/2)+"%"+"&nbsp;";
	document.getElementById("p2").innerHTML="cst "+ (browser/2)+"%"+"&nbsp;";
	$("#text1").show();
		$("#text2").show();
var z= parseInt(t1)-[parseInt(y)+parseInt(y)];
    document.getElementById("result").value = z;
}
</script>
</head>

<body>

<?php
include_once("first.php");
?>

<div class="container">

<div class="panel panel-primary">
      <div class="panel-heading">Delar Bill</div>
      <div class="panel-body">

<form method="post" >
<table class="table table-hover">
	<tr><td><b>S.No </b>&nbsp;<input type="number" name="sno" class="form-control"></td><td><b>Date</b> &nbsp;<input type="date" name="date" class="form-control"></td></tr>
	
	<tr><td><b>Bill no</b> &nbsp;<input type="text" name="billno" class="form-control"></td><td><b>GST no</b><input type="text" name="gstno" class="form-control" ></td></tr>
	<tr><td><b>Delar name</b></td><td><input type="text"  class="form-control" name="name" >
	</td></tr>
	<tr><td><b>Particulars</b></td><td><input type="text"  class="form-control" name="par" >
	</td></tr>
	<tr><td><b>Total Amount with GST</b></td><td><input type="text" name="text" id="text" class="form-control"></td></tr>
	
	
	<tr><td><b>GST %</b></td><td> <input type="radio" name="browser" onclick="myFunction(this.value)" value="8">8%
  <input type="radio" name="browser" onclick="myFunction(this.value)" value="12">12%
  <input type="radio" name="browser" onclick="myFunction(this.value)" value="28">28%</td></tr>
  <tr><td></td><td><table><td><span id="p1"></span></td><td><input type="text" name="text1" id="text1" style="display:none;" class="form-control "></td>
<td><span id="p2"></span></td><td><input type="text" name="text2" id="text2" style="display:none;" class="form-control"></td></table></td>
  </tr>

	<tr><td> <b>price</b></td><td><input type="text"  name="amount" id="result" class="form-control" ></td></tr>
	</table>
<button type="submit"  class="btn btn-primary" name="b1" >SAVE</button>

  
<?php
if(isset($_REQUEST['b1']))
{
	$s=$_REQUEST["sno"];
  $x1=$_REQUEST["date"];
  $x2=$_REQUEST["billno"];
  $x3=$_REQUEST["gstno"];
  $x4=$_REQUEST["par"];
  $x5=$_REQUEST["name"];
  $x6=$_REQUEST["text"];
  
  $x7=$_REQUEST["browser"];
  $x8=$_REQUEST["amount"];
  
  
$m=mysqli_connect('localhost','root','','gst');
 $q="insert into purch values('$s','$x1','$x2','$x3','$x4','$x5','$x6','$x7','$x8')";
$rs=mysqli_query($m,$q);
if($rs)
{
  echo"<script>alert('sucessfully insert')</script>";
}
else
{
 echo"<script>alert('error')</script>";
}
}
?>














</form>
</div>
</div>
</div>
</body>
</html>