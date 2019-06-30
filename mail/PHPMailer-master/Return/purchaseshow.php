<html>
<head>
<!--<script src="jq.js"></script>
<script src="bootstrap.min.js"></script>
<link href="bootstrap.min.css" rel="stylesheet">-->
</head>

<body>
<style>
#b{
	   margin-left:970px;
	   
			}
</style>


<script>
		function myfunction()
		{
			window.print();
		}
</script>

<?php
include_once("first.php");
?>


 <button onclick="myfunction()" class="btn btn-primary" id="b" >print </button>
<h2></h2>

<?php
$c=mysqli_connect('localhost','root','','gst');
$q="select *from purch ";
$rs=mysqli_query($c,$q);
echo"<table class='table table-bordered'><TR ><TD>SNO</TD><TD>Date</TD><TD>Bill no</TD><TD >NAME</TD><TD >PARTICULARS</TD><TD >PRICE</TD><TD >GST NO</TD><TD >GST</TD><TD >AMOUNT</TD></TR>";
while($row=mysqli_fetch_array($rs))
{
echo"<tr><td>$row[purch_sno]</td>
	<td>$row[purch_date]</td>
	<td>$row[purch_billno]</td>
	<td>$row[purch_name]</td>
	<td>$row[purch_par]</td>
	<td>$row[purch_price]</td>
	<td>$row[purch_gstno]</td>
	<td>$row[purch_gst]</td>
	<td>$row[purch_amount]</td>
	
	</tr>";
}
echo"</table>";
?>
</div>
</div>

</body>
</html>