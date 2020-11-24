<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  states where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:satate_list.php");
?>
