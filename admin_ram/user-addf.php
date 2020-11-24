<?php

session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
validate_admin();


if(isset($_POST['submit'])){
 
    $name=$_POST['full_name'];
  $email=$_POST['email'];
  $mobile=$_POST['contect_no'];
  $address=$_POST['address'];
  $subject=$_POST['subject'];
 $subject_class=$_POST['subject_class'];
 $master_degree=$_POST['master_degree'];
  $role=$_POST['role'];
if($_POST['id']==''){
$obj->query("INSERT INTO `table_techer`(`fname`, `email`, `contect_no`, `address`, `subject`, `subject_class`, `master_degree`, `role`) VALUES ('$name','$email','$mobile','$address','$subject','$subject_class','$master_degree','$role')"); //die;
$_SESSION['sess_msg']='Customer added successfully';  

  header("location:user-list.php");
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
        <h1><?php if($_REQUEST['id']==''){?> Teacher <?php }else{?> Update <?php }?> Registration</h1>
      
      </section>
      <section class="content">
        
          <form name="customerfrm" id="customerfrm" method="POST" enctype="multipart/form-data" action="">
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Full Name</label>
                  <input type="text" name="full_name" class="required form-control" >
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mobile No.</label>
               <input type="text" name="contect_no" class="required form-control" >
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address.</label>
                   <input type="text" name="address" class="required form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Subject.</label>
                    <input type="text" name="subject" class="required form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Subject_class.</label>
                    <input type="text" name="subject_class" class="required form-control">
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>High Qulifaction.</label>
                     <input type="text" name="master_degree" class="required form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Role.</label>
                       <input type="text" name="role" class="required form-control">
                  </div>
                </div>
				
              </div>
            </div>
            <div class="box-footer">
              <input type="submit" name="submit" value="Submit"  class="button" border="0"/>&nbsp;&nbsp;
              <input name="Reset" type="reset" id="Reset" value="Reset" class="button" border="0" />
            </div>
          </form>
        </div>
      </section>
    </div>
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
</body>
</html>
