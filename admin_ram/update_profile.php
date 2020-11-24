<?php
include("config.php");
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
  $name =$_POST['name'];
    $moblie =$_POST['moblie'];
	  $email =$_POST['email'];
	   $address =$_POST['address'];
  
     
    $img=time().$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/products/".$img);
    copy("uploads/products/".$img,"uploads/products/thumb/".$img);
    
    
    
    copy("uploads/products/".$img,"uploads/products/tiny/".$img);

  }
   
$sql=mysqli_query($counts, "UPDATE `table_profile` SET `name`='$name',`photo`='$img',`mobile_no`='$moblie',`email`='$email',`address`='$address'  WHERE id='$id'");
header( 'Location: wineshop_list.php' );




?>