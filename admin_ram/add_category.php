<?php

session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
validate_admin();


if(isset($_POST['submit'])){
 $full_name=$_POST['name'];





if($_POST['id']==''){
	
$obj->query("INSERT INTO `category`(`model_shop`) VALUES ('$full_name')"); //die;
$_SESSION['sess_msg']='Customer added successfully';  

  header("location:category_list.php");
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
        <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Category</h1>
      
      </section>
      <section class="content">
        
          <form name="customerfrm" id="customerfrm" method="POST" enctype="multipart/form-data" action="">
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Catoery Name</label>
                  <input type="text" name="name" class="required form-control" >
                  </div>
                </div></div
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
</body>
</html>
