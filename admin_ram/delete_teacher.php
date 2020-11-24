<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  table_techer where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:user-list.php");
?>