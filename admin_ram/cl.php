<?php
$con = mysql_connect('localhost', 'root', '');
mysql_select_db("students", $con);
?>
<html>
<head>
<script>

function showUser(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","get-data.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

Select Your Country< select onChange="showUser(this.value)">
<?php
$sql="SELECT * FROM country";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
$id=$row['id'];
echo "<option value='$id'>" . $row['country'] . "</option>";
}
?>
</select>

<div id="txtHint" style="width:100px; border:0px solid gray;">
<b>your city disp here</b>
</div>

</body>
</html>