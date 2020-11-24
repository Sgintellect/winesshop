<?php
ob_start();
session_start(); 
include('include/config.php');
include("include/functions.php");
//include("include/simpleimage.php");
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
        <div class="col-md-3 listpage"><h4>Manage Services</h4></div>
        <div class="col-md-6"><p style="text-align:center"><?php if($_SESSION['sess_msg']){ ?><span class="box-title" style="font-size:12px;color:#a94442"><strong><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']='';?></strong></span> <?php }?></p></div>
        <!-- <div class="col-md-3"><p style="text-align:right">
          <span><input type="button" name="add" value="Add Services"  class="button" onclick="location.href='services-addf.php'" /></span>  
          </p>
        </div> -->
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
    <form name="frm" method="post"  enctype="multipart/form-data">
          <div class="row">
         <div class="col-md-3">
         <td> Select Client</td>
          <select class="form-control" name="cid" >
            <option value="">Select Client</option>
            <?php 
            $sql=$obj->query("select * from $tbl_user where 1=1",$debug=-1);
          while($res=$obj->fetchNextObject($sql)){
           ?>       
           <option value="<?php echo $res->id; ?>"><?php echo $res->fname;?><?php echo $res->lname;?></option> 
         <?php } ?>
            
                    </select>
                
         </div>
         <div class="col-md-3">
         <td>From Date</td>                
                  <div class="form-group" style="width:100%">
                    <div class="input-group">
                    <input type="text" class="form-control" name ="from_date" id="from_date" value="<?php echo date('d-m-Y');?>"   placeholder="Enter Mobile Number" />                    
                  </div>                
               </div>
                  
         </div>
         <div class="col-md-3">
         <td>To Date</td>                
                  <div class="form-group" style="width:100%">
                    <div class="input-group">
                    <input type="text" class="form-control" name ="to_date" id="to_date" value="<?php echo date('d-m-Y');?>"   placeholder="Enter Mobile Number" />                    
                  </div><!-- /.input group -->                
               </div>
                  
         </div>
         <div class="col-md-3" style="margin-top:20px;">
         <button type="submit" class="btn btn-success btn-sm"  name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>Submit</button>
         <button id="myBtn" class="btn btn-success btn-sm" onclick="download();"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download Excel</button>        
         </div>
        </div>


<?php
if(isset($_POST['submit']))
 {   
  $cid=$_POST['cid'];
  $newDate   =    $_POST['from_date'];
  $from_date =    date("Y-m-d", strtotime($newDate));
  //
  $newDate1  =    $_POST['to_date'];
   $to_date  =    date("Y-m-d", strtotime($newDate1));
  //
  $from_date_old = $_POST['from_date'];
  $to_date_old   = $_POST['to_date']; 
   $qq           = $obj->query("select fname from tbl_user where id='$cid'",-1); //die;
  //$result=mysqli_query($conn,$qq);
  if($row=$obj->fetchNextObject($qq))
  {
  
  $name = $row->fname;
  $lname = $row->lname;


  }
    
    ?>
    <input type="hidden" id="cid1" name="cid1" value="<?php echo $cid;?>">
    <input type="hidden" id="from_date1" name="from_date1" value="<?php echo $from_date;?>">
    <input type="hidden" id="to_date1" name="to_date1" value="<?php echo $to_date;?>">
    <H4 style="text-align:center;">DEEPANJALI SALON</H4>
    <H4 style="text-align:center;">GAZIABAD</H4>
    <div>
    <h5> Customer Name : <?php echo $name.$lname;?><span class="pull-right">From: <?php echo $from_date_old;?> &nbsp;To : <?php echo $to_date_old;?> </span></h5><BR>
    </div>
    <?PHP
    
    echo "<table class=table border=\"1\">\n";
    ?>
      <tr>
      <th>SNO.</th>
      <th>Name</th>
      <th>DATE</th>
      <th>AMOUNT</th>
      <!-- <th>TYPE</th> -->
     </tr>
     
    <?php
     $i = 1;
$sql=$obj->query("select * from ladger  where cid='$cid' and cr_date between '$from_date' and '$to_date' order by name",-1);



/*$sql="SELECT ORDER_ID,CR_DATE,AMOUNT,CLIENT_NAME,TYPE FROM (
SELECT mas.orderid AS ORDER_ID,
mas.cr_date AS CR_DATE,
mas.final_amount AS AMOUNT,
mas.name AS CLIENT_NAME,
'SALES' AS 'TYPE'
FROM `master` mas 
WHERE mas.`cr_date` BETWEEN '".$from_date."' and '".$to_date."'  and mas.cid='".$cid."'
UNION ALL
SELECT recp.pid AS ORDER_ID,
recp.paymentDate AS CR_DATE,
recp.paidAmount AS AMOUNT,
recp.name AS CLIENT_NAME,
recp.paymentMode AS TYPE
FROM `receviedpayment` recp
WHERE recp.`cid`='".$cid."' and recp.`paymentDate` BETWEEN '".$from_date."' and '".$to_date."'
    ) a ORDER BY CLIENT_NAME";*/
    //$q=mysqli_query($conn,$sql);
    while($row=$obj->fetchNextObject($sql))
    { 
        //print_r($row);
    ?>

          <tr>
        <td><?php echo $i;?></td>
         <td><?php echo $row->name;?></td>
      <td><?php echo $row->cr_date ;?></td>    
      <td><?php echo $row->balance;?></td>
      <!-- <td><?php echo $row['TYPE'];?></td> -->

     </tr>
<?PHP
 $i++;
    }
 }
?>
  </table>
                
        
      <div class="row">
          <!-- <div class="col-md-9"></div> -->
          <div class="col-md-12">
          <input type="hidden" name="what" value="what" />
          <input type="submit" name="Submit" value="Enable" class="button btn-success" onclick="return del_prompt(this.form,this.value)" />
          <input type="submit" name="Submit" value="Disable" class="button btn-warning" onclick="return del_prompt(this.form,this.value)" />
          <input type="submit" name="Submit" value="Delete" class="button btn-danger" onclick="return del_prompt(this.form,this.value)" />
          </div>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

<script type="text/javascript">
            // When the document is ready
     $(document).ready(function () {
     $('#from_date').datepicker({
     format: "dd-mm-yyyy"
     });  
   $('#to_date').datepicker({
     format: "dd-mm-yyyy"
    });  
            
 });
  function download(){  
  var cid = $("#cid1").val();
  var from_date = $("#from_date1").val();
  var to_date = $("#to_date1").val();
    var page='downloaddailyreport.php';
  window.location.href = "downloaddailyreport.php?cid=" + cid + "&from_date=" + from_date + "&to_date=" + to_date;

  }
</script>
</body>
</html>
