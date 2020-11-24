<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
 include("conn.php");
 if(isset($_POST['add_sub_menu']))
{
 $parent=$_POST['parent'];
 $subject = $_POST['subject'];
 
 $sql=$dbcon->query("INSERT INTO `subject`(`class_id`, `subject`) VALUES ('$parent','$subject')");

       header("location:subject_list.php");
     exit();
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
      <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Subject</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="subject_list.php">View Services List</a></li>
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
				  <select name="parent" class="form-control mmm">
<option selected="selected">select  Class</option>
<?php
$res=$dbcon->query("SELECT * FROM class");
while($row=$res->fetch_array())
{
 ?>
    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
    <?php
}
?>
</select>

              </div>
            </div>
		  
            <div class="col-md-4">
              <div class="form-group">
                <label>Subject Name</label>
				<input type="text" placeholder="Subject " name="subject" class="form-control mmm" /><br />
				  

              </div>
            </div>


		
		
          </div>
		<div class="box-footer">
		<button type="submit" name="add_sub_menu"value="Submit"  class="button">Add sub menu</button>
&nbsp;&nbsp;
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
