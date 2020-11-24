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
        <div class="col-md-3 listpage"><h4>User log Ip </h4></div>
        <div class="col-md-6"><p style="text-align:center"><?php if($_SESSION['sess_msg']){ ?><span class="box-title" style="font-size:12px;color:#a94442"></span> <?php }?></p></div>
        <div class="col-md-3"><p style="text-align:right">
  
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
          <div class="box">
            <div class="box-body">
              <table id="faq-grid" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                   <th>Id</th>
                  <th>Name</th> 
                  <th>Date</th>          
                  <th>Operations</th>
                   </tr>
                     </thead>
                    <tbody>
                <?php
                session_start();
   $phone= $_SESSION['phone'];
include("config.php");

?> 
  <?php 
  $query =mysqli_query($counts,"select * from `student_registation`");
 

                                  while($row=mysqli_fetch_array($query))
          {


             extract($row);
              $_SESSION['aaaa']=$row['name'];
            $_SESSION['image']=$row['photo'];

  ?>
                <tr>
          <td
            <td><?php echo $row['id']; ?></td>
         
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['Date']; ?></td> 
                    <td><?php echo $row['address_ip']; ?></td> 

       


     
                </tr>
        <?php }?>
        
                </tbody>        
                <tfoot>
                </tfoot>        
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
