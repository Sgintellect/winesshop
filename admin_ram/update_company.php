<?php
include("config.php");
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
  $full_name=$_POST['name'];
  $email=$_POST['email'];
$address=$_POST['address'];
 $mobile=$_POST['mobile'];
 $date=$_POST['date'];
 
    $Image=new SimpleImage();
    $img=time().$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/products/".$img);
    copy("uploads/products/".$img,"uploads/products/thumb/".$img);
    $Image->load("uploads/products/thumb/".$img);
    $Image->resize(160,50);
    $Image->save("uploads/products/thumb/".$img);
    
    
    copy("uploads/products/".$img,"uploads/products/tiny/".$img);
    $Image->load("uploads/products/tiny/".$img);
    $Image->resize(100,100);
    $Image->save("uploads/products/tiny/".$img);
    
    copy("uploads/products/".$img,"uploads/products/big/".$img);
    $Image->load("uploads/products/big/".$img);
    $Image->resize(825,440);
    $Image->save("uploads/products/big/".$img);
	
	$Image=new SimpleImage();
    $img1=time().$_FILES['pencard']['name'];
    move_uploaded_file($_FILES['pencard']['tmp_name'],"uploads/products/".$img1);
    copy("uploads/products/".$img,"uploads/products/thumb/".$img1);
    $Image->load("uploads/products/thumb/".$img1);
    $Image->resize(160,50);
    $Image->save("uploads/products/thumb/".$img1);
    
    
    copy("uploads/products/".$img,"uploads/products/tiny/".$img1);
    $Image->load("uploads/products/tiny/".$img1);
    $Image->resize(100,100);
    $Image->save("uploads/products/tiny/".$img1);
    
    copy("uploads/products/".$img1,"uploads/products/big/".$img1);
    $Image->load("uploads/products/big/".$img1);
    $Image->resize(825,440);
    $Image->save("uploads/products/big/".$img1);
	
	$Image=new SimpleImage();
    $img2=time().$_FILES['pencard']['name'];
    move_uploaded_file($_FILES['pencard']['tmp_name'],"uploads/products/".$img2);
    copy("uploads/products/".$img,"uploads/products/thumb/".$img2);
    $Image->load("uploads/products/thumb/".$img2);
    $Image->resize(160,50);
    $Image->save("uploads/products/thumb/".$img2);
    
    
    copy("uploads/products/".$img,"uploads/products/tiny/".$img2);
    $Image->load("uploads/products/tiny/".$img2);
    $Image->resize(100,100);
    $Image->save("uploads/products/tiny/".$img2);
    
    copy("uploads/products/".$img2,"uploads/products/big/".$img2);
    $Image->load("uploads/products/big/".$img2);
    $Image->resize(825,440);
    $Image->save("uploads/products/big/".$img2);
 

$sql=mysqli_query($counts, "UPDATE `tabl_company` SET `name`='$full_name',`Email`='$email',`mobile_no`='$mobile',`Address`='$address',`Aadhar_no`='$img',`Pencard_no`='$img1',`other_doc`='$img2',`date`='$date' WHERE id='$id'");
header( 'Location: company_list.php' );
}




?>