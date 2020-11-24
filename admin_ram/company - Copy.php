<?php

session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
validate_admin();
 include("conn.php");

if(isset($_POST['submit'])){
 $full_name=$_POST['name'];
  $email=$_POST['email'];
$address=$_POST['address'];
 $mobile=$_POST['mobile'];
 $state=$_POST['state'];
  $city=$_POST['city'];
 $date=$_POST['date'];
 if($_FILES['photo']['size']>0 && $_FILES['photo']['error']==''){


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
	
  }

if($_POST['id']==''){

$obj->query("INSERT INTO `tabl_company`(`name`,`Email`,`mobile_no`, `Address`, `Aadhar_no`, `Pencard_no`,`other_doc`,`state`,`city`,`date`) VALUES('$full_name','$email','$mobile','$address','$img1','$img','$img2','$state','$city','$date')"); //die;
$_SESSION['sess_msg']='Customer added successfully';  

  header("location:company_list.php");
exit();
} 

}else{ 	  
$obj->query("update table_techer set full_name='$name',email='$email',contect_no='$email',address='$mobile',subject='$address',subject_class='$gstno',master_degree='$hsnno'role='$hsnno', where id ='".$_REQUEST['id']."'",$debug=-1); //die;
$_SESSION['sess_msg']='Customer updated successfully';   
}
     
   


if($_REQUEST['id']!=''){
  $sql=$obj->query("select * from table_techer where id=".$_REQUEST['id']);
  $result=$obj->fetchNextObject($sql);
}

?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Company</h1>
      
      </section>
      <section class="content">
        
          <form name="customerfrm" id="customerfrm" method="POST" enctype="multipart/form-data" action="">
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Company Name</label>
                  <input type="text" name="name" class="required form-control" >
                  </div>
                </div>
				  <div class="col-md-4">
                  <div class="form-group">
                    <label>Company Email ID</label>
                  <input type="email" name="email" class="required form-control" >
                  </div>
                </div>
				
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Contact No</label>
                  <input type="text" name="mobile" class="required form-control" >
                  </div>
                </div>
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Company_address</label>
                  <input type="text" name="address" class="required form-control" >
                  </div>
                </div>
				
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Aadhar_No</label>
			   
		   <input type="file" name="photo" class="required form-control" >
                  
                 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Pancard_No</label>
                  <input type="file" name="pencard" class="required form-control" >
                  </div>
                </div>
				
				
				
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Other Document</label>
                  <input type="file" name="Otherdocument" class="required form-control" >
                  </div>
                </div>
				<div class="col-md-4">
                  <div class="form-group">
                    <label>State</label>
			   
			<select name="state" id="subId" class="form-control mmm">
<option data="0" value="0">Select State</option>
<?php
include('conn.php');
$sql = mysqli_query($dbcon,"select * from states");
while($row=mysqli_fetch_array($sql))
{
echo '<option data="'.$row['state_id'].'" value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
} ?>
</select>
                  
                 
                  </div>
                </div>
				<div class="col-md-4">
                  <div class="form-group">
                    <label>City</label>
			   
			  <select name="city" id="subList" class="form-control mmm">
               <option>Select City</option>
                </select>
                  
                 
                  </div>
                </div>
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Date</label>
                  <input type="date" name="date" class="required form-control" >
                  </div>
                </div>
				</div
<div class="box-footer">
              <input type="submit" name="submit" value="Submit"  class="button" border="0"/>&nbsp;&nbsp;
              <input name="Reset" type="reset" id="Reset" value="Reset" class="button" border="0" />
            </div>
          </form>
        </div>
        
      </section>
    </div>
	<style>
	.form-group.bbb {
    margin-top: 34px;
}
	</style>
    <?php include("footer.php"); ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.min.js"></script>
  <script src="js/demo.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function(){
      $("#customerfrm").validate();
    })
  </script>
  <script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var state_id =$(this).find('option:selected').attr('data');
var post_id = 'id='+ state_id ;



$.ajax({
type: "POST",
url: "ajax.php",
data: post_id,
success: function(cities)
{
 console.log('ooookkkk',cities);  
$("#subList").html(cities);
} 
});

});
});
</script>
</body>
</html>
