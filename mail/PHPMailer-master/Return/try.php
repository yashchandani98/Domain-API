
<html>
<head>

</head>

<body>

<?php
include_once("first.php");
?>
<form>
<button type="submit" name="b1">purchase</button>
<button type="submit" name="b2">sell</button>
</form>

<?php
if(isset($_REQUEST["b1"]))
{
$d=date('m/d/y');

$c=mysqli_connect('localhost','root','','gst');
$q="select * from purchase ";
$rs=mysqli_query($c,$q);
$sum=0;
while($row=mysqli_fetch_array($rs))
{
$d1=$row['date'];
if(strtotime($d1)==strtotime($d))
{

$sum=$sum+$row['price'];
}
}
echo $sum;
}




if(isset($_REQUEST["b2"]))
{
$d=date('m/d/y');

$c=mysqli_connect('localhost','root','','gst');
$q="select * from sell";
$rs=mysqli_query($c,$q);
$sum=0;
while($row=mysqli_fetch_array($rs))
{
$d1=$row['date'];
if(strtotime($d1)==strtotime($d))
{

$sum=$sum+$row['price'];
}
}
echo $sum;
}
?>

</body>
</html>