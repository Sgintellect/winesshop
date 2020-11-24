<?php
ob_start();
session_start(); 
include('include/config.php');
include("include/functions.php");
validate_admin();
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("menu.php"); ?>
  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">					
						<div class="form-header">
							<h2 style="color: #641145e6; margin-left: 40px; margin-top: 100px; ">BOOK AN APPOINTMENT ONLINE</h2>
						</div>			
						<form name="appointment_reg.php" id="servicefrm" method="POST" enctype="multipart/form-data" action="">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Name</span>
										<input class="form-control" type="text" placeholder="Enter your name" name="name">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" placeholder="Enter your email" name="email">
									</div>
								</div>
							</div>
                              <div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Phone</span>
								<input type="text" class="form-control" placeholder="Enter your phone number" name="phone">
							</div>
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Services</span>
                                                                
                                                                <select name="services" class="form-control">
                                                                <?php 
                                                                 $service= $obj->query("select * from product_new where product_status=1");

                                                                while($res=$obj->fetchNextObject(service)){ ?>
                                                               <option id="<?php echo $res->pid;?>"><?php echo $res->product_name;?>
                                                               </option>
                                                               <?php } ?>
                                                                
                                                                </select>
			
							</div>
                                                        </div>
                                                       
							<div class="form-group">
								<span class="form-label">Gender</span>
								<label class="radio-inline">
                                <input type="radio" name="optradio" value="male" checked>Male
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="optradio" value="female">Female
                                </label>
             				    <label class="radio-inline">
     							<input type="radio" name="optradio" value="other">Others
   							    </label>
							</div>
							<div class="row">
							<div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Location</span>
								<!-- <input class="form-control" type="text" placeholder="Enter ZIP/Location"> -->
								<select name="location" id="" class="form-control">
									<option value="0">Select Location</option>
									<option value="noida">Noida</option>
									<option value="gaziabad">Gaziabad</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group input-append date ">
								<span class="form-label">Date</span>
								 <!-- <input class="form-control" placeholder="Enter Date"> -->
								<input type="text" name="appoindate" placeholder="Enter Date"  class="form_datetime" readonly>
								
							</div>
						</div>
						  
					</div>
							
							<div class="form-btn">
							<input type="submit" value="submit" name="submit">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
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
    $("#banner-list").DataTable();
  });
</script>
<script>
	function del_prompt(frmobj,comb)
		{
		//alert(comb);
			if(comb=='Delete'){
				if(confirm ("Are you sure you want to delete record(s)"))
				{
					frmobj.action = "appointment-del.php";
					frmobj.what.value="Delete";
					frmobj.submit();
					
				}
				else{ 
				return false;
				}
		}
		else if(comb=='Disable'){
			frmobj.action = "appointment-del.php";
			frmobj.what.value="Disable";
			frmobj.submit();
		}
		else if(comb=='Enable'){
			frmobj.action = "appointment-del.php";
			frmobj.what.value="Enable";
			frmobj.submit();
		}
		
	}

</script>
<script type="text/javascript">
function showOnhome(id,chk){
	$.ajax({
		url:"showBannerOnHome.php",
		data:{id:id,chk:chk},
		success:function(data){
			
			$("#msg").html("Record updated successfully").show().fadeOut('slow');
		}
		
		})
}
</script>
<script src="js/change-status.js"></script> 

</body>
</html>
