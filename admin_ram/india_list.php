
<?php

session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
//include("include/csphead.php");
validate_admin();


if(isset($_POST['import'])){
  
	// including db config file
	include_once './config/db-config.php';

	// including import controller file
	include_once './controllers/import-controller.php';

	// creating object of DBController class
	$db              =    	new DBController();

	// calling connect() function using object
    $conn            =    	$db->connect();

    // creating object of import controller and passing connection object as a parameter
	$importCtrl      =    	new ImportController($conn);
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
        <h1><?php if($_REQUEST['id']==''){?> Select  <?php }else{?> Update <?php }?> District</h1>
      
      </section>
      <section class="content">
        
      
</head>
                    <form name="myform" method="post" enctype="multipart/form-data" action="">
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
                  <th>Select State</th>
                  <th>Select District</th>
                  <th>Select Catogery</th>
				   <th>Upload Shop</th
                </tr>
                </thead>
                <tbody>
        <tr>
				
          <td>
            <div class="squaredFour">
                  <input type="checkbox" class="checkall" id="squaredFour<?php echo $line->pid;?>" name="ids[]" value="<?php echo $line->pid;?>" />
                  <label for="squaredFour<?php echo $line->pid;?>"></label>
                </div>
          </td>
		 
           <td><select name="state" id="subId" class="form-control mmm">
                   <option data="0" value="0">Select State</option>
                           <?php
                      include('conn.php');
                         $sql = mysqli_query($dbcon,"select * from states");
                       while($row=mysqli_fetch_array($sql))
                                  {
                          echo '<option data="'.$row['state_id'].'" value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
                            } ?>
                      </select> </td> 
          <td><select name="city" id="subList" class="form-control mmm">
               <option>Select District</option>
                </select></td> 
	     

          <td>
		  <select name="category" id="subId" class="form-control mmm">
                   <option data="0" value="0">Select Category</option>
                           <?php
                      include('conn.php');
                         $sql = mysqli_query($dbcon,"select * from category");
                       while($row=mysqli_fetch_array($sql))
                                  {
                          echo '<option data="'.$row['id'].'" value="'.$row['model_shop'].'">'.$row['model_shop'].'</option>';
                            } ?>
                      </select>
		  </td>
   <td><input type="file" name="file" class="form-control">							<button type="submit" name="import" class="btn btn-success"> Import Data </button>
                        </td> 	
         
           
       
</tr>
        <?php}}?>
		
        
                </tbody>        
                <tfoot>
                </tfoot>        
              </table>
            </div>            
            <!-- /.box-body -->
          </div>
      <div class="row mt-4">
				<div class="col-md-10 m-auto">
					<?php

						$importResult   =  $importCtrl->index(); 	
											
					?>
				</div>
			</div>	
        </form>
<center>

                
 
	
				
	
    
</body>
</html>



        
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
  <script type="text/javascript">
$(document).ready(function(){
$("#subId").change(function(){
var state =$(this).find('option:selected').attr('data');
var post_id = 'id='+ state ;

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
