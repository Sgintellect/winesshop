<?php
include("config.php");
if (isset($_POST['submit'])) {

    $id=$_POST['id'];
   $full_name=$_POST['name'];
   $class=$_POST['class'];
  $Subject=$_POST['subject'];
  $title=$_POST['title'];
  $metadescription = $_POST['metadescription'];
  $descrption =$_POST['descrption'];
  
  
  }
$sql=mysqli_query($counts, "UPDATE `vid_entry` SET `name`='$full_name',
	`class`='$class',`subject`='$Subject',`title`='$title',`mmm`='$metadescription',`descrption`='$descrption' WHERE id='$id'");
header( 'Location: services-list.php' );


?>