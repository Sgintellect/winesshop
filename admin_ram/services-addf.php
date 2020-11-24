<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
      
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
        
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class = $obj->escapestring($_POST['class']);
  $Subject = $obj->escapestring($_POST['Subject']);
  $title = $obj->escapestring($_POST['title']);
  $metadescription = $obj->escapestring($_POST['metadescription']);
  $Descrption = $obj->escapestring($_POST['Descrption']);
  $date = $obj->escapestring($_POST['date']);
$class_id = $obj->escapestring($_POST['class_id']);
  }
   if($_REQUEST['id']==''){
  
      $obj->query("INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption','$date')"); //die;
     
       

      $_SESSION['sess_msg']='Services  added successfully';  
         header("location:services-list.php");
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
     header("location:services-list.php");
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
      <h1><?php if($_REQUEST['id']==''){?> Upload <?php }else{?> Update <?php }?> Video</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="services-list.php">View Services List</a></li>
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

      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
          <select name="class" id="subId" class="form-control mmm">
              <option data="0" value="0">Select Class</option>
                        <?php
               include('conn.php');
              $sql = mysqli_query($dbcon,"select * from class");
                  while($row=mysqli_fetch_array($sql))
                   {
             echo '<option data="'.$row['class_id'].'" value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
                  } ?>
                 </select>              
               </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
               <select name="Subject" id="subList" class="form-control mmm">
                <option>Select subject</option>
                 </select>
               </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" class="form-control mmm" id="countrySelect">

              </div>
            </div>
            <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
            <input type="text" name="Descrption" class='form-control' /><br/>
          </div>
        </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Video Name</label>
           <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
          <input type="file" name="file"  class="form-control mmm"id="file"/>
 </div>
            </div>
               <div class="col-md-6">
          <div class="form-group">
            <label>Time Duration </label>
         <input type="text" name="metadescription" class="form-control mmm" id="citySelect" size="1">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#active-order").DataTable();
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var country_id=$(this).find('option:selected').attr('data');
var post_id = 'id='+ country_id;

alert(country_id);

$.ajax({
type: "POST",
url: "ajax.php",
data: post_id,
success: function(cities)
{
  
$("#subList").html(cities);
} 
});

});
});
</script>
</body>
</html>
<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
      
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
        
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class = $obj->escapestring($_POST['class']);
  $Subject = $obj->escapestring($_POST['Subject']);
  $title = $obj->escapestring($_POST['title']);
  $metadescription = $obj->escapestring($_POST['metadescription']);
  $Descrption = $obj->escapestring($_POST['Descrption']);
$class_id = $obj->escapestring($_POST['class_id']);
  }
   if($_REQUEST['id']==''){
  
      $obj->query("INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption')"); //die;
     $classInsrt=$obj->query("INSERT INTO `class` VALUES ('','$class')");
     $subjectInsrt=$obj->query("INSERT INTO `subject` VALUES ('','$class_id','$Subject')");
       

      $_SESSION['sess_msg']='Services  added successfully';  
         header("location:services-list.php");
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
     header("location:services-list.php");
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
      <h1><?php if($_REQUEST['id']==''){?> Upload <?php }else{?> Update <?php }?> Video</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="services-list.php">View Services List</a></li>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Video Name</label>
           <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
            <input type="file" name="file"  class="form-control mmm"id="file" />

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
          
<select name="class" id="subId" class="form-control mmm">
<option data="0" value="0">Select Class</option>
<?php
include('conn.php');
$sql = mysqli_query($dbcon,"select * from class");
while($row=mysqli_fetch_array($sql))
{
echo '<option data="'.$row['class_id'].'" value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
} ?>
</select>              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
        <select name="Subject" id="subList" class="form-control mmm">
<option>Select subject</option>
</select>
           

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" class="form-control mmm" id="countrySelect">

              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label>Meta_ Description </label>
<input type="text" name="metadescription" class="form-control mmm" id="citySelect" size="1">

          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
            <input type="text" name="Descrption" class='form-control' /><br/>
          
             
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#active-order").DataTable();
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var country_id=$(this).find('option:selected').attr('data');
var post_id = 'id='+ country_id;

alert(country_id);

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
<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
      
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
        
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class = $obj->escapestring($_POST['class']);
  $Subject = $obj->escapestring($_POST['Subject']);
  $title = $obj->escapestring($_POST['title']);
  $metadescription = $obj->escapestring($_POST['metadescription']);
  $Descrption = $obj->escapestring($_POST['Descrption']);
$class_id = $obj->escapestring($_POST['class_id']);
  }
   if($_REQUEST['id']==''){
  
      $obj->query("INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption')"); //die;
     $classInsrt=$obj->query("INSERT INTO `class` VALUES ('','$class')");
     $subjectInsrt=$obj->query("INSERT INTO `subject` VALUES ('','$class_id','$Subject')");
       

      $_SESSION['sess_msg']='Services  added successfully';  
         header("location:services-list.php");
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
     header("location:services-list.php");
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
      <h1><?php if($_REQUEST['id']==''){?> Upload <?php }else{?> Update <?php }?> Video</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="services-list.php">View Services List</a></li>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Video Name</label>
           <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
            <input type="file" name="file"  class="form-control mmm"id="file" />

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
          
<select name="class" id="subId" class="form-control mmm">
<option data="0" value="0">Select Class</option>
<?php
include('conn.php');
$sql = mysqli_query($dbcon,"select * from class");
while($row=mysqli_fetch_array($sql))
{
echo '<option data="'.$row['class_id'].'" value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
} ?>
</select>              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
        <select name="Subject" id="subList" class="form-control mmm">
<option>Select subject</option>
</select>
           

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" class="form-control mmm" id="countrySelect">

              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label>Meta_ Description </label>
<input type="text" name="metadescription" class="form-control mmm" id="citySelect" size="1">

          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
            <input type="text" name="Descrption" class='form-control' /><br/>
          
             
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#active-order").DataTable();
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var country_id=$(this).find('option:selected').attr('data');
var post_id = 'id='+ country_id;

alert(country_id);

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
<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
      
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
        
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class = $obj->escapestring($_POST['class']);
  $Subject = $obj->escapestring($_POST['Subject']);
  $title = $obj->escapestring($_POST['title']);
  $metadescription = $obj->escapestring($_POST['metadescription']);
  $Descrption = $obj->escapestring($_POST['Descrption']);
$class_id = $obj->escapestring($_POST['class_id']);
  }
   if($_REQUEST['id']==''){
  
      $obj->query("INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption')"); //die;
     $classInsrt=$obj->query("INSERT INTO `class` VALUES ('','$class')");
     $subjectInsrt=$obj->query("INSERT INTO `subject` VALUES ('','$class_id','$Subject')");
       

      $_SESSION['sess_msg']='Services  added successfully';  
         header("location:services-list.php");
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
     header("location:services-list.php");
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
      <h1><?php if($_REQUEST['id']==''){?> Upload <?php }else{?> Update <?php }?> Video</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="services-list.php">View Services List</a></li>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Video Name</label>
           <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
            <input type="file" name="file"  class="form-control mmm"id="file" />

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
          
<select name="class" id="subId" class="form-control mmm">
<option data="0" value="0">Select Class</option>
<?php
include('conn.php');
$sql = mysqli_query($dbcon,"select * from class");
while($row=mysqli_fetch_array($sql))
{
echo '<option data="'.$row['class_id'].'" value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
} ?>
</select>              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
        <select name="Subject" id="subList" class="form-control mmm">
<option>Select subject</option>
</select>
           

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" class="form-control mmm" id="countrySelect">

              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label>Meta_ Description </label>
<input type="text" name="metadescription" class="form-control mmm" id="citySelect" size="1">

          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
            <input type="text" name="Descrption" class='form-control' /><br/>
          
             
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#active-order").DataTable();
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var country_id=$(this).find('option:selected').attr('data');
var post_id = 'id='+ country_id;

alert(country_id);

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
<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
      
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
        
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class = $obj->escapestring($_POST['class']);
  $Subject = $obj->escapestring($_POST['Subject']);
  $title = $obj->escapestring($_POST['title']);
  $metadescription = $obj->escapestring($_POST['metadescription']);
  $Descrption = $obj->escapestring($_POST['Descrption']);
$class_id = $obj->escapestring($_POST['class_id']);
  }
   if($_REQUEST['id']==''){
  
      $obj->query("INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption')"); //die;
     $classInsrt=$obj->query("INSERT INTO `class` VALUES ('','$class')");
     $subjectInsrt=$obj->query("INSERT INTO `subject` VALUES ('','$class_id','$Subject')");
       

      $_SESSION['sess_msg']='Services  added successfully';  
         header("location:services-list.php");
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
     header("location:services-list.php");
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
      <h1><?php if($_REQUEST['id']==''){?> Upload <?php }else{?> Update <?php }?> Video</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="services-list.php">View Services List</a></li>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Video Name</label>
           <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
            <input type="file" name="file"  class="form-control mmm"id="file" />

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
          
<select name="class" id="subId" class="form-control mmm">
<option data="0" value="0">Select Class</option>
<?php
include('conn.php');
$sql = mysqli_query($dbcon,"select * from class");
while($row=mysqli_fetch_array($sql))
{
echo '<option data="'.$row['class_id'].'" value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
} ?>
</select>              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
        <select name="Subject" id="subList" class="form-control mmm">
<option>Select subject</option>
</select>
           

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" class="form-control mmm" id="countrySelect">

              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label>Meta_ Description </label>
<input type="text" name="metadescription" class="form-control mmm" id="citySelect" size="1">

          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
            <input type="text" name="Descrption" class='form-control' /><br/>
          
             
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#active-order").DataTable();
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var country_id=$(this).find('option:selected').attr('data');
var post_id = 'id='+ country_id;

alert(country_id);

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
