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
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("menu.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="row">
        <div class="col-md-3 listpage"><h4>Company List</h4></div>
        <div class="col-md-6"><p style="text-align:center"><?php if($_SESSION['sess_msg']){ ?><span class="box-title" style="font-size:12px;color:#a94442"></span> <?php }?></p></div>
        <div class="col-md-3"><p style="text-align:right">
          <span><input type="button" name="add" value="Add Company"  class="button" onclick="location.href='company.php'" /></span>  
          </p>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
    <form name="frm" method="post" action="services-del.php" enctype="multipart/form-data">
          <div class="box"style="overflow-x:auto;>
            <div class="box-body">
              <table id="faq-grid" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="50px"><div class="squaredFour">
                      <input name="check_all" type="checkbox"  id="check_all" value="check_all" />
                      <label for="check_all"></label>
                    </div>
                  </th>
                  <th>Company Name</th>
				 <th>Authorized Person Name</th>
				
				   <th>Company Email ID</th>
				     <th>Company Mobile No</th>
				<th>Company Address</th>
				<th>Post Office</th>
				<th>State</th>
				<th>City</th>
				<th>Pincode</th>
				<th>Company Pancard No</th>
			     <th>Company Certificate</th>
				<th>T.T.N. No</th>
				<th>GST No</th>
				<th>Company Logo</th>
				<th>Babk Name</th>
				<th>Branch Name</th>
				<th>IFSC Code</th>
				<th>Account No</th>
				 <th>Account Name</th>
				<th>Account Type</th>
				<th>Date Of Incorporaton</th>
				<th>Action</th>
                </tr>
                </thead>
                <tbody>
           <?php
   $phone= $_SESSION['phone'];
include("config.php");

?> 
  <?php 
  $query =mysqli_query($counts,"select * from `tabl_company`");
    while($row=mysqli_fetch_array($query))
          {
     extract($row);
            ?>
                <tr>
          <td>
            <div class="squaredFour">
                  <input type="checkbox" class="checkall" id="squaredFour<?php echo $line->pid;?>" name="ids[]" value="<?php echo $line->pid;?>" />
                  <label for="squaredFour<?php echo $line->pid;?>"></label>
                </div>
          </td>
           <td><?php echo $row['name'];?></td>
		   <td><?php echo $row['Authorized_name'];?></td>
		   <td><?php echo $row['Email'];?></td> 
          <td><?php echo $row['mobile_no'];?></td> 
		   <td><?php echo $row['Address'];?></td>		  
		   <td><?php echo $row['Post Office'];?></td>
		   <td><?php echo $row['state'];?></td>
		   <td><?php echo $row['city'];?></td>
		   <td><?php echo $row['pinocde'];?></td>
		     <td><img src="uploads/products/tiny/<?php echo $row['Pencard_no'];?>"/></td> 
		    <td><img src="uploads/products/tiny/<?php echo $row['Certificate'];?>"/></td> 
		 <td><img src="uploads/products/tiny/<?php echo $row['ttn_No'];?>"/></td>
		 <td><img src="uploads/products/tiny/<?php echo $row['gst_no'];?>"/></td> 
		 <td><img src="uploads/products/tiny/<?php echo $row['Logo'];?>"/></td> 
		   <td><?php echo $row['bank_name'];?></td>
		   <td><?php echo $row['branch_name'];?></td>
		   <td><?php echo $row['ifcs_code'];?></td>
		   <td><?php echo $row['account_no'];?></td>
		   <td><?php echo $row['account_name'];?></td>
		   <td><?php echo $row['type_account'];?></td>
            <td><?php echo $row['date'];?></td> 		   
		
           <td><a href="edit_company.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary"title="edit"> <i class="fa fa-pencil"></i></a>
     <a href="delete_company.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" title="delete"> <i class="fa fa-trash" aria-hidden="true"></i></a>
</td>  
</tr>
        <?php }?>
        
                </tbody>        
                       
              </table>
            </div>            
            <!-- /.box-body -->
          </div>
      
        </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






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
    $("#faq-grid").DataTable();
  });
</script>
<script>
  function del_prompt(frmobj,comb)
    {
    //alert(comb);
      if(comb=='Delete'){
        if(confirm ("Are you sure you want to delete record(s)"))
        {
          frmobj.action = "services-del.php";
          frmobj.what.value="Delete";
          frmobj.submit();
          
        }
        else{ 
        return false;
        }
    }
    else if(comb=='Disable'){
      frmobj.action = "services-del.php";
      frmobj.what.value="Disable";
      frmobj.submit();
    }
    else if(comb=='Enable'){
      frmobj.action = "services-del.php";
      frmobj.what.value="Enable";
      frmobj.submit();
    }
    
  }

</script>
<script src="js/change-status.js"></script> 
</body>
</html>
