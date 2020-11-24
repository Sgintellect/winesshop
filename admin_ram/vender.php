
<?php
ERROR_REPORTING(0);
 include("../include/config.php");
 $tamount="";$duetotal="";
 $camount="";$damount="";$orderid="";
 $to_date='';
 $from_date='';
 $cid='';
 session_start();
if(!$_SESSION["sess_admin_id"])
	  {
		 header("location:index.php?notlogedin=You are not Log in !"); 
	  }
	  $name="";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Deepanjali Salon</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/font-awesome-min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
   <body>
     <nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
      <div class="navbar-brand" style="text-align:left; height=2px; width=5px;"><?php echo " @! : " .$_SESSION["sess_admin_id"]."</p>" ?></div> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav> 
 
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>Client Details 
			</div>
			<!-- /panel-heading -->
			<form class="form-horizontal" action="" method="post" id="getOrderReportForm">
			<div class="panel-body">
				<div class="row">
				 <div class="col-md-3">
				 <td> Select Client</td>
                      <select class="form-control"  id="cid" name="cid" required>
					  <option value="">Select Client</option>
					  <?php 
					  $sql="SELECT * FROM product_new where product_status=1 ORDER BY product_name";
					  $q=mysqli_query($conn,$sql);
					   while($row=mysqli_fetch_assoc($q)){ 
						echo '<option value='.$row['pid'].'>'.$row['product_name'].'</option> '; 
					  }
					  ?>
                    </select>
				 </div>
				 <div class="col-md-3">
				 <td>From Date</td>
								
								  <div class="form-group" style="width:100%">
			     					<div class="input-group">

									  <input type="text" class="form-control" name ="from_date" id="from_date" value="<?php echo date('d-m-Y');?>"   placeholder="Enter Mobile Number" />
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									</div><!-- /.input group -->
								
							 </div>
									
				 </div>
				 <div class="col-md-3">
				 <td>To Date</td>
								
								  <div class="form-group" style="width:100%">
			     					<div class="input-group">

									  <input type="text" class="form-control" name ="to_date" id="to_date" value="<?php echo date('d-m-Y');?>"   placeholder="Enter Mobile Number" />
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									</div><!-- /.input group -->					
								</div>
									
				 </div>
				 <div class="col-md-3" style="margin-top:20px;">
				 <button type="submit" class="btn btn-success btn-sm"  name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>Submit</button>
				 <button id="myBtn" class="btn btn-success btn-sm" onclick="download();"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download Excel</button>				
				</div>
				</div>		
				</form>
			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>

<?php
if(isset($_POST['submit']))
 {   
    $cid=$_POST['cid'];
	$newDate =$_POST['from_date'];
	$from_date = date("Y-m-d", strtotime($newDate));
	//
	$newDate1 =$_POST['to_date'];
	$to_date = date("Y-m-d", strtotime($newDate1));
	//
	$from_date_old=$_POST['from_date'];
	$to_date_old=$_POST['to_date'];  
	
    $qq="select name from client where id='$cid'";
	$result=mysqli_query($conn,$qq);
	if($row=mysqli_fetch_assoc($result))
	{
	
		$name=$row['name'];
	}
	  
	  ?>
	  <input type="hidden" id="cid1" name="cid1" value="<?php echo $cid;?>">
	  <input type="hidden" id="from_date1" name="from_date1" value="<?php echo $from_date;?>">
	  <input type="hidden" id="to_date1" name="to_date1" value="<?php echo $to_date;?>">
	  <H4 style="text-align:center;">Deepanjali Salon</H4>
	  <H4 style="text-align:center;">GAZIABAD</H4>
	  <div>
	  <h5> Customer Name : <?php echo $name;?><span class="pull-right">From: <?php echo $from_date_old;?> &nbsp;To : <?php echo $to_date_old;?> </span></h5><BR>
	  </div>
	  <?PHP
	  
	  echo "<table class=table border=\"1\">\n";
	  ?>     
		   
		   <tr>
	      <th>Date</th>
		  <th>
		  <table width="100%"style="text-align:center" >
		  <tr>
		  <td colspan="3" style="font-family:verdana;padding:5px;">Particulars</td>		 

		</tr>
		  <tr>		    
		    <td>PRODUCT</td>
			<td>RATE</td>
		    <!-- <td>QNT</td> -->
			
		  </tr>  		
		  </table>		  
		  </th>		     
		  <th>TYPE</th>
		  
		  <th>DEBIT</th>
		   <th>CREDIT</th>
		  <th style="text-align:center;">BALANCE</th>
	   </tr>
	   
<?php
	 $i = 1;
	    $sql="select * FROM master where cid='$cid' and cr_date BETWEEN '$from_date' and '$to_date'  ORDER BY cr_date DESC";
	  $q=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($q))
	  {	
	  	print_r($row); die;
        $camount=$camount+$row['credit'];
		$damount=$damount+$row['debit'];		
		$orderid=$row['orderid'];
		  
		  
?>

          <tr>
	      <td><?php 
		  
		  $newDate =$row['cr_date'];
	      echo $rdate = date("d-m-Y", strtotime($newDate));
		  
		  ?></td>
		  <th style="background-color:white;">
         	 
		<?php 
		echo  $sql1="select product_name,product_status,price,product_new.product_name AS product_new FROM 
				product_new
				left join master on(product_new.pid=master.cid)
				where id='$orderid'";
	    $sql2=mysqli_query($conn,$sql1);
		$numRows=mysqli_num_rows($sql2);
		?>
		 <table width="100%">
		
		  <tr>
		    <td>
		  <!-- <?php 
          if($numRows>0)
		  {?>
			  <a href="javascript:void(0);" onclick="showitemdet('<?php echo $i?>');"><?php echo $row['item']; ?>
			  
		 <?php }
		 else
		 {
			 echo $row['item'];
		 }
		  ?> -->
			
			
			
			 <!-- <ul id="item_<?php echo $i?>" style="display:none;">
				<?php  
                 
				
				  while($row=mysqli_fetch_assoc($sql))
				  {	
					$pname=$row['pid'];
					$item=$row['item'];
					$rate=$row['rate'];
     				$quantity=$row['quantity'];
					
					?>
					<li style="word-spacing:40px;"><?php echo "<span >$pname $item $rate $quantity </span>";?> </li>
				  <?php }?>
			  </ul> -->
			
			
			</td>
		   
		  </tr>
		  
		
		  </table>
		  
		  </th>
		     
		  <td><?php echo $row['type'];?></td>
		  
		  
		  <td><?php echo $row['debit'];?></td>
		   <td><?php echo $row['credit'];?></td>
		  <td STYLE="text-align:right;"><?php echo $camount-$damount; ?></td>
	   </tr>


		
		
		
		
		
		
		
	
<?PHP
 $i++;
 
 }
echo "<tr>\n";
echo "\n";
echo "\n";
echo "\n";
echo "<td>Total Amount :</td>\n";
echo "<td></td>\n";
echo "<td></td>\n";
echo "<td>";echo $damount;"</td>\n";
echo "<td>";echo $camount;"</td>\n";
 }
 




if($camount>=$damount)
{
	$tamount=$camount-$damount;
	$tamount="$tamount";
	
}else
{
	$tamount=$damount-$camount;
	$tamount=" - $tamount";
}
   ?>
     <td> <?php  $tamount;?></td>

  
   </tr>
		  
		  

	  
	  </table>
</div>

  <script>
  function showitemdet(itemid)
  {
	   if(document.getElementById("item_"+itemid).style.display=='block')
	   {
		   document.getElementById("item_"+itemid).style.display = 'none';
	   }
	   else if(document.getElementById("item_"+itemid).style.display=='none')
	   {
			document.getElementById("item_"+itemid).style.display = 'block';
	   }
  }
  </script>
					
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker-min.js"></script>
    <script src="js/datepicker.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
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
    var page='downloadledger.php';
window.location.href = "downloadledger.php?cid=" + cid + "&from_date=" + from_date + "&to_date=" + to_date;

	}
</script>
  </body>
</html>
