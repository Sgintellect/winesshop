<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from tbl_shop_list where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:shop_list.php");
?>