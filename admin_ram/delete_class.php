<?php
include("conn.php");
$id=$_GET['id'];
$sql="SELECT * FROM `class` where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location: class_list.php");
?>