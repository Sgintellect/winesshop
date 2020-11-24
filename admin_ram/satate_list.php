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
        <div class="col-md-3 listpage"><h4>Work  State</h4></div>
        <div class="col-md-6"><p style="text-align:center"><?php if($_SESSION['sess_msg']){ ?><span class="box-title" style="font-size:12px;color:#a94442"></span> <?php }?></p></div>
        <div class="col-md-3"><p style="text-align:right">
          <span><input type="button" name="add" value="Add State"  class="button" onclick="location.href='#'" /></span>  
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
                  <th width="50px"><div class="squaredFour">
                      <input name="check_all" type="checkbox"  id="check_all" value="check_all" />
                      <label for="check_all"></label>
                    </div>
                  </th>
                  <th>All State </th>
				 
        
                   <th>Action</th>
                   <th>Selected State </th>
                </tr>
                </thead>
                <tbody>
           <?php
   $phone= $_SESSION['phone'];
include("config.php");

?> 
  <?php 
  $query =mysqli_query($counts,"select * from `states`");
 

                                  while($row=mysqli_fetch_array($query))
          {


             extract($row);
            
  ?>
                <tr>
          <td>
		  <input type="checkbox" id="state" name="check_all[]" value="<?php echo $row['state_id']; ?>"/></td>
           
          </td>
		      <td class="ankCity"><?php echo $row['state_name']; ?></td>
            <td><a href="edit_student.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary"title="edit"> <i class="fa fa-pencil"></i></a>
     <a href="delete_state.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" title="delete"> <i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
<td>	<div id="result" style=""></div></td>
</tr>
        <?php }?>
	
        
                </tbody>        
                       
              </table>
            </div>            
            <!-- /.box-body -->
          </div>
     <div class="row">
          <!-- <div class="col-md-9"></div> -->
          <div class="col-md-12">
          <input type="hidden" name="what" value="what" />
          <input type="submit" name="Submit" value="Enable" class="button btn-success" onclick="return del_prompt(this.form,this.value)" />
          <input type="submit" name="Submit" value="Delete" class="button btn-warning" onclick="return del_prompt(this.form,this.value)" />
          
          </div>
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
          frmobj.action = "delete_state.php";
          frmobj.what.value="Delete";
          frmobj.submit();
          
        }
        else{ 
        return false;
        }
    }
    else if(comb=='Disable'){
      frmobj.action = "delete_state.php";
      frmobj.what.value="Disable";
      frmobj.submit();
    }
    else if(comb=='Enable'){
      frmobj.action = "delete_state.php";
      frmobj.what.value="Enable";
      frmobj.submit();
    }
    
  }

</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
				var selectedCity = $(this).closest("tr").find(".ankCity").text();
 $(this).closest("tr").find("#result").append("<span>"+ selectedCity +"<i class='fa fa-close' ></i></span>");
            }
        });
		$(document).on("click","#result > span > i", function(){
			$(this).parents("span").remove();
		});
    });
</script>
<script src="js/change-status.js"></script> 
<style>
#result > span{
    background: #337ab7;
    color: #fff;
    margin-right: 10px;
    padding: 10px 10px;
    border-radius: 5px;	
}
#result > span > i{
    font-size: 18px;
    font-weight: 100;
    padding-left: 5px;
    padding-top: 5px;
}	
}
</style>
</html>
