<?php
ob_start();
session_start();
include('include/config.php');
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
      <h1>Update Company</h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
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
 $record = mysqli_query($counts, "SELECT * FROM `tabl_company` WHERE id='$id'");
   
    if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $id=$n['id'];
       $full_name=$n['name'];
$email=$n['Email'];
$mobile=$n['mobile_no'];
$Address=$n['Address'];
$Aadhar_no=$n['Aadhar_no'];
$Pencard_no=$n['Pencard_no'];
$other_doc=$n['other_doc'];
$date=$n['date'];


  
         
          
     
    }
  }

                  ?>        
          <form name="customerfrm" id="customerfrm" method="POST" enctype="multipart/form-data" action="update_company.php">
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="text" name="name" value="<?php echo $full_name; ?>"  class="required form-control" >
                  </div>
                </div>
        <div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email ;?>" class="form-control" >
                  </div>
                </div>

<div class="col-md-3">
                  <div class="form-group">
                    <label>Aadhar_No</label>
               <input type="file" name="photo" class="required form-control" >
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mobile No.</label>
               <input type="text" name="mobile" value="<?php echo $mobile ; ?>" class="required form-control" >
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address.</label>
                   <input type="text" name="address" value="<?php echo $Address; ?>"  class="required form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <label><b>Pancard_No </b></label>
                   <input type="file" name="pencard" class="required form-control" >


                  </div>
                </div>
             
                   
        <div class="col-md-3">
                  <div class="form-group">
                    <label>Other Document</label>
                       <input type="file" name="Otherdocument" class="required form-control" >
                  </div>
                </div>
				     <div class="col-md-3">
                  <div class="form-group">
                    <label>Date</label>
                       <input type="text" name="date" value="<?php echo $date; ?>" class="required form-control">
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
 

  <?php
   include('include/config.php');

   include("footer.php"); ?>
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
