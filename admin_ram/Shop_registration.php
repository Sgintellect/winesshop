<?php
include("config.php");
if(isset($_POST['submit'])){
 $full_name=$_POST['name'];
 $shop=$_POST['shopnnn'];
 
 $address=$_POST['address'];
 $mobile=$_POST['mobile'];
 $date=$_POST['date'];
 if($_FILES['photo']['size']>0 && $_FILES['photo']['error']==''){


  
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
  }
}
$query="INSERT INTO `tbl_shop_list`(`Shop_name`,`Shop_tpye`,`Shop_address`,`Shop_contactno`,`Shop_document`,`date`) VALUES ('$full_name','$shop','$address','$mobile','$img','$date')";
$result = mysqli_query($con,$query);

if($query)
{
	 echo  "Record Saved Successfully";
     // sleep(5);
//header("Location: register.php");
      //header("location:http://localhost/educom/");

	echo "Record saved succefully";
}
else
{
	echo "Record not saved";
}


?>