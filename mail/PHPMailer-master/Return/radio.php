<!DOCTYPE html>
<html>
<body>

<p>Select your favorite browser:</p>
<form action="/action_page.php">
<input type="texxt" name="text" id="text"><input type="texxt" name="text1" id="text1">
<input type="texxt" name="text2" id="text2">
  <input type="radio" name="browser" onclick="myFunction(this.value)" value="8">8<br>
  <input type="radio" name="browser" onclick="myFunction(this.value)" value="12">12<br>
  <input type="radio" name="browser" onclick="myFunction(this.value)" value="28">28<br>
 

  Your favorite browser is: <input type="text" id="result">
  
</form>

<script>
function myFunction(browser) {
	var t1= document.getElementById("text").value;
	var y= (t1*(browser/2))/100;
	document.getElementById("text1").value = y;
	document.getElementById("text2").value = y;
var z= parseInt(t1)-[parseInt(y)+parseInt(y)];
    document.getElementById("result").value = z;
}
</script>

</body>
</html>
