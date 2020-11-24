<?php

session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
validate_admin();


if(isset($_POST['submit'])){
 
$full_name=$_POST['name'];
$email=$_POST['email'];
$Mobile=$_POST['mobile'];
$class=$_POST['class'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$date=$_POST['date'];

if($_POST['id']==''){
	
$obj->query("INSERT INTO `student_registation`( `name`, `email`, `phone`, `class`,`address`,`gender`,`dob`,`Date`) VALUES ('$full_name','$email','$Mobile','$class','$address','$gender','$dob','$date')"); //die;
$_SESSION['sess_msg']='Customer added successfully';  

  header("location:student-list.php");
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
        <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Student</h1>
      
      </section>
      <section class="content">
        
          <form name="customerfrm" id="customerfrm" method="POST" enctype="multipart/form-data" action="">
            
           <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">




<center>
<pre>
<form method="post">
<input type="text" placeholder="Class" name="class" /><br />
<button type="submit" name="add_main_menu">Add Class</button>
</form>
</pre>
<br />
<pre>
<form method="post">
<select name="parent">
<option selected="selected">select parent Class</option>
<?php
$res=$dbcon->query("SELECT * FROM class");
while($row=$res->fetch_array())
{
 ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['class_name']; ?></option>
    <?php
}
?>
</select><br />
<input type="text" placeholder="Class_name :" name="subject" /><br />
<button type="submit" name="add_sub_menu">Add sub menu</button>
</form>
</pre>
<a href="index.php">back to main page</a>
</center>

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
