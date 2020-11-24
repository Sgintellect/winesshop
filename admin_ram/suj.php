<?php
$con = mysql_connect('localhost', 'root', '');
mysql_select_db("students", $con);
$q=$_GET["q"];
$sql="SELECT * FROM city WHERE c_id ='$q'";

$result = mysql_query($sql);
echo "Your City <select>";
while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['city'] . "</option>";
}
echo "</select>";

mysql_close($con);
?>
?>
