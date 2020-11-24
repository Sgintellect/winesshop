<?php

include("config.php");

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    
 $name=$_POST['full_name'];

  $email=$_POST['email'];
  $mobile=$_POST['contect_no'];
  $address=$_POST['address'];
  $subject=$_POST['subject'];
 $subject_class=$_POST['subject_class'];
 $master_degree=$_POST['master_degree'];
  $role=$_POST['role'];

$sql=mysqli_query($counts,"UPDATE `table_techer` SET `fname`='$name',`email`=' $email',`contect_no`='  $mobile',`address`='$address',`subject`='$subject',`subject_class`='$subject_class',`master_degree`='$master_degree',`role`='$role' WHERE id='$id'");

header( 'Location: user-list.php' );
}



?>
