<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
  $class = $obj->escapestring($_POST['class']);
    if($_REQUEST['id']==''){
 
      $obj->query("INSERT INTO `class`(`class_name`) VALUES ('$class')"); //die;

      $_SESSION['sess_msg']='Services  added successfully';  
       header("location:class_list.php");
     exit();
    }else{  
   
       $sql= " update $product_new set product_name='$name',`category`='$category',`Service`='$Service'";
       if($img){
        $imageArr=$obj->query("select photo from $product_new where pid=".$_REQUEST['id'],-1);
        $resultImage=$obj->fetchNextObject($imageArr);
        @unlink("uploads/products/".$resultImage->photo);
        @unlink("uploads/products/thumb/".$resultImage->photo);
        $sql.=" , photo='$img' ";
      }
       $sql.=" where pid='".$_REQUEST['id']."'";

      $obj->query($sql,-1);
      $_SESSION['sess_msg']='Services updated sucessfully';   
    }
     header("location:subject_list.php");
     exit();
  }      
     
     
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $product_new where pid=".$_REQUEST['id']);
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
      <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Class</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="class_list.php">View Services List</a></li>
      </ol>
	  
	  
    </section>
    <section class="content">
      <div class="box box-primary">
		<form name="frm" id="servicefrm" method="POST" enctype="multipart/form-data" action="">
		<input type="hidden" name="submitForm" value="yes" />
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
        <div class="box-body">

       </div>
	   <div class="box-body">
	      <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Class Name</label>
				   <input type="text" name="class" class="form-control mmm">

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
    $("#servicefrm").validate();
})
</script>
</body>
</html>
