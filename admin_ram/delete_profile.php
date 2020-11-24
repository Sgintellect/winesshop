<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  table_profile where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:wineshop_list.php");
?>