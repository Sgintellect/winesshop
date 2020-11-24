<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  category where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:category_list.php");
?>