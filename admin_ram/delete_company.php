<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  tabl_company where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:company_list.php");
?>