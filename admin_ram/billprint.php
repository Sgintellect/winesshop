
<?php
include("include/config.php");
       session_start();
   /* if(!$_SESSION["login_user"])
    {
     header("location:index.php?notlogedin=You are not Log in !"); 
    }*/
 /*$orderid="";
 $pname='';
 $pitem='';
 $rate=''; //die;
$quantity='';*/

$discount='';
$grounAmount='';
$cname='';
$cid='';
$date='';
$orderid='';
$paymentmode='';
$mobile='';
$debitAmount='';
$debitAmt='';
$creditAmount='';
$creditAmt='';
$address="";
$sgst="";
$cgst="";
$msg="";

if(isset($_POST['submit']))
{
 // print_r($_POST); // die;
   $orderid=$_POST['orderid'];
   $cid=$_POST['cid'];
  $gstinno=$_POST['gstinno'];
  $cname=$_POST['name'];
//  $name=$_POST['lname'];
  $newDate =$_POST['from_date'];
  $date = date("Y-m-d", strtotime($newDate)); 
  $mobile = $_POST['mobile'];
  $pitem = $_POST['productid']; 
  $rate = $_POST['rate']; 
  $quantity =  $_POST['qty'];
  $total=  $_POST['amount'];
  $subAmount=$_POST['subamount'];
  $discount=$_POST['discount'];
  $balance= implode(',',$_POST['amount']);
  $grounAmount=$_POST['grandamount']; 
  $address=$_POST['address'];
  $sgstT=$_POST['sgst'];
  $cgstT=$_POST['cgst']; 
  $finalAmount=$_POST['finalamount'];   
  $sgst=$grounAmount*$sgstT/100;
  $cgst=$grounAmount*$cgstT/100;
  //$igst=$grounAmount*$igstT/100;
  $taxamt=$grounAmount+$sgst+$cgst+$igstT;
  $taxamount=number_format($finalAmount,2);
    
    $qq = $obj->query("insert into master set orderid='$orderid',cid='$cid',name='$cname',cr_date='$date',sub_amount='$subAmount',discount='$discount',grandamount='$grounAmount',gst_state='$sgstT',gst_central='$cgstT',final_amount='$finalAmount',address='$address',mobile='$mobile',gstno='$gstinno'",-1);   
 
    //ladger table
        $le=$obj->query("insert into ladger set cid='$cid',item='$pitem',qnt='$quantity',rate='$rate',type='$type',debit='$debit',credit='$credit',balance='$balance',orderid='$orderid',cr_date='$date',name='$cname',address='$address'",-1);   
  
        
    //product details
    for($i = 0; $i<count($pitem); $i++)
    {
    
      $proSql=$obj->query("SELECT product_name from product_new where pid='".$cid[$i]."'",-1);
               $dataPro=mysqli_fetch_array($proSql);
               $product_name=$dataPro["product_name"]; 
   

  }

}
if(isset($_POST['back']))
{
  
    header("Location:invoiceform.php");
}
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

    <title>Deepanjali Saloon</title>

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
    <!-- <!--  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
      <div class="navbar-brand" style="text-align:left; height=2px; width=5px;"></div> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   
          
  

  <!-- start Invoice-->
  <div class="container">
<div id="content">
  <div id="content-header">
  <div>
   <h3>GSTIN : 09ALKPB1734D1ZI
 <b style="text-align:center; margin-left:200px;">TAX Invoice</b>
  <span style="margin-left:250px;">Origanal Bill</span></h3>
  </div>
  <?php echo " @! : " .$_SESSION['sess_admin_username']."</p>" ?>
  </div>
  <div class="container-fluid" style="width: 1000px;"><hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>                
          </div>
          <div class="widget-content">
            <div class="row-fluid">   
                    <div class="span6">
                <table class="">
                  <tbody>
          <tr>
           <td> <img src="../images/footer-logo.png" alt=""></td>
          </tr>
                    <tr>
                      <td><h1>Deepanjali Saloon</h1></td>
                    </tr>
                    <tr>
                      <td><b>Noida</b></</td>
                    </tr>
                    <tr>
                      <td><b>B9. 1st Floor</b></td>
                    </tr>
                    <tr>
                      <td><b>Ashok Nagar , Gaziabad</b></td>
                    </tr>
                    <tr>
                      <td >Mobile : +91 9643168361</td>
                    </tr>
          <tr>
                      <td >Email : info@deepanjalisalon.com</td>
                    </tr>
          <tr>
                      <td >Website |URL : www.deepanjalisaloon.com</td>
                    </tr>
                  </tbody>
                </table>
              </div> 
        
        <p><h4>Invoice Number : <?php echo $orderid;?><span style="text-align:right;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;
        Date  : <?php echo $nice_date = $date = date('Y-m-d H:i:s');?>
</h4></span></p>
         <hr style="border-width:2px;border-display:black;border-color:black;">
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
         
                    <tr>
                    <tr>
            <td class="width30">Customer Name :</td>
                      <td class="width70"><strong><?php echo $cname;?> </strong></td>
                    </tr>
                    <tr>
                      <td>Customer GSTIN No :</td>
                      <td><strong><?php echo $gstinno;?></strong></td>
                    </tr>
                    <!--<tr>
                      <td>HSN/SAC CODE :</td>
                      <td><strong><?php //echo $hsn;?></strong></td>
                    </tr>-->
                    <tr>
                      <td>Customer Mobile Number :</td>
                      <td><strong><?php echo $mobile;?></strong></td>
                    </tr>
                  <td class="width30">Client Address:</td>
				      <td><strong><?php echo $address;?></strong></td>
                    <!-- <td class="width70"><strong>Client Company name.</strong> <br>
                      <?php echo $address; ?> <br>
                      Bihar <br>
                      Contact No:<?php $mobile?> <br>
                      Email: youremail@companyname.com </td> -->
                  </tr>
                    </tbody>
                  
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">S. No.</th>                     
                      <th class="head1">Service Name</th>
                     <th class="head0 right" style="text-align:right;">Rate</th>
                      <th class="head1 right" style="text-align:right;">Quantity</th>
                      <th class="head0 right" style="text-align:right;">Amount</th> 
					  
                    </tr>
                  </thead>
                  <tbody>
           
              <?php
			
                $ii=1;
             for($i=0;$i<count($pitem);$i++)
             {

            
      $proSql=$obj->query("SELECT product_name from product_new where pid=$pitem[$i]",-1);
              $dataPro=$obj->fetchNextObject($proSql);
                             
               
                   $product_name=  $dataPro->product_name;
                       
        
          ?>
		  
		  
		  
               <tr>
               <td><?php echo $ii;?></td>
               <td><?php echo $product_name ;?></td>
               <td style="text-align:right;"><?php echo $rate[$i];?></td>
               <td style="text-align:right;"><?php echo $quantity[$i];?></td>
               <td style="text-align:right;"><?php echo ($total[$i]);?></td>
             
                <?php
              $ii++;  }        ?>       
           
            
                    </tr>                                    
                                      
        
                      <td></td>
                      <td></td>
                      <td class="right"></td>
                      <td class="right"><b>TOTAL AMOUNT</b></td>
                      <td class="right" style="text-align:right;"><strong><?php echo ($subAmount);?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full" width="10%">
                  <tbody>
                    <tr>
                     <td class="msg-invoice" width="50%" height="30%"><h4>Rs. In Words. </h4><?php include_once('amuntconverintoword.php');echo convert_number_to_words($finalAmount)." RUPESS ONLY";?></td> 
                      <br>
             <hr>
            <td class="right">  <strong>Discount </strong> <br>
             <hr>
             <strong>Total Amount Before Tax %</strong> <br>
             <hr>
            <strong>CGST <?php echo $sgstT; ?> %</strong> <br>
             <hr>
                        <strong>SGST <?php echo $cgstT; ?> %</strong> <br>
            <hr>
        
            <hr>
            
            
                        <strong>TOTAL AFTER TAX</strong></td>
                      <br>
            <hr>
                       <td class="right" style="text-align:right;"><strong>  <?php echo $discount;?> <br>
            <hr>
                        <?php echo $subAmount+$trans-$discount;?> <br>
            <hr>
                        <?php echo $sgst;?> <br>
            <hr>
                        <?php echo $cgst;?> <br>
            <hr>
                       
            <hr>
                        <?php echo $taxamount;?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                 <!--  <h4><span>For M/s Sanjay Kumar </span></h4> -->
          <br>
          </br>
                  <h4><span>Authorized Signature </span></h4>        
              </div>     
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<hr>
</div>
      
             
    
               <button type="button" name="add" id="add" class="btn btn-active" onclick="window.print()"><span class="glyphicon glyphicon-download-alt"></span>&nbsp; PRINT </button>
     
      <button type="button" name="back" id="back" class="btn btn-danger" onclick="backPages();"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp; BACK </button>
         </div>
      </div>
  
  <script>
  
  </script>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  <script>
  function backPages(){
    window.location.href = 'invoiceform.php';
  }
  </script>
  </body>
</html>