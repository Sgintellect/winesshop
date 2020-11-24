<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  subject where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:subject_list.php");
?>