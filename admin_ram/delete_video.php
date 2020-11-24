<?php
include("conn.php");
$id=$_GET['id'];
$sql="delete from  vid_entry where id='$id'";
$q=mysqli_query($dbcon ,$sql);

header("location:services-list.php");
?>