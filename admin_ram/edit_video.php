<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
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
           <?php
 include("config.php");
      
  if (isset($_GET['edit'])) {
    @session_start();
    $id = $_GET['edit'];

   $phone= $_SESSION['phone']; 
       $update = true;
$record = mysqli_query($counts, "SELECT * FROM `vid_entry` WHERE id='$id'
");
   if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $id=$n['id'];
  $full_name=$n['name'];
  $class=$n['class'];
$subject=$n['subject'];
$title=$n['title'];
$mmm=$n['mmm'];
$descrption=$n['descrption'];


    }
  }
    ?>        
      <div class="box box-primary">
    <form name="frm" id="servicefrm" method="POST" enctype="multipart/form-data" action="update_video.php">
    
  
        <div class="box-body">

       </div>
     <div class="box-body">
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
          <label>Video Name</label>
    <input name="id" type="hidden" value="<?php echo $n['id'];?>" />
      
  <input type="text" name="name" value="<?php echo $full_name; ?>" class="form-control mmm"id="file" />


              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> Class Name</label>
            <input type="text" name="class"  value="<?php echo $class; ?>"  class="form-control mmm"id="file" /></div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label>Subject Name</label>
      <input type="text" name="subject"  value="<?php echo $subject; ?>"  class="form-control mmm"id="file" /> 
           

              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group">
                <label> title Name</label>
           <input type="text" name="title" value="<?php echo $title; ?>" class="form-control mmm" id="countrySelect">

              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label>Meta_ Description </label>
<input type="text" name="metadescription" value="<?php echo $mmm; ?>" class="form-control mmm" id="citySelect" size="1">

          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Descrption</label>
<input type="text" name="descrption"
value="<?php echo $descrption; ?>"class='form-control'/><br/>
          
             
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
