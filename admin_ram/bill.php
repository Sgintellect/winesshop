<?php
include_once("connection.php");
       session_start();
    if(!$_SESSION["login_user"])
    {
     header("location:index.php?notlogedin=You are not Log in !"); 
    }
$orderid="";
$pname='';
$pitem='';
$rate='';
$quantity='';
$subAmount='';
$discount='';
$trans='';
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
$igst="";
$msg="";
if(isset($_POST['submit']))
{
  $orderid=$_POST['orderid'];
  $cid=$_POST['cid'];
  $gstinno=$_POST['gstinno'];
  $cname=$_POST['name'];
  //
    $newDate =$_POST['from_date'];
  $date = date("Y-m-d", strtotime($newDate));
  //$date=$_POST['from_date'];
  $row['join_date'] =$date;
  $mobile=$_POST['mobile'];
  $pname=$_POST['brandid'];
    $pitem=$_POST['productid'];
  $rate=$_POST['rate'];
  $quantity=$_POST['qty'];
  $total=$_POST['amount'];
    $subAmount=$_POST['subamount'];
  $trans=$_POST['trans'];
  $discount=$_POST['discount'];
  $grounAmount=$_POST['grandamount'];
  //$hsn=$_POST["hsn"];
  $address=$_POST['address'];
  $sgstT=$_POST['sgst'];
  $cgstT=$_POST['cgst'];
  $igstT=$_POST['igst'];
  $finalAmount=$_POST['finalamount'];
    
  $sgst=$grounAmount*$sgstT/100;
  $cgst=$grounAmount*$cgstT/100;
  $igst=$grounAmount*$igstT/100;
    $taxamt=$grounAmount+$sgst+$cgst+$igstT;
    $taxamount=number_format($finalAmount,2);
    //master table
    $qq="insert into master values('','$orderid','$cid','$cname','$date','$subAmount','$discount','$trans','$grounAmount','$sgstT','$cgstT','$igstT','$finalAmount','$address','$mobile','$gstinno')";  
    $ff=mysqli_query($conn,$qq);
    //ladger table
        $le="insert into ladger values('','$cid','SALE','','','SALES','$finalAmount','','$finalAmount','$orderid','$date','$cname')";
    mysqli_query($conn,$le);
    //product details
    for($i = 0; $i<count($pname); $i++)
    {
    if($pname[$i]!='')
    {
      $sq="select brandname from brand where brandid='".$pname[$i]."' ";
      $res=mysqli_query($conn,$sq);
      $data=mysqli_fetch_array($res);
      $brandname=$data["brandname"];
      $q="insert into productsell values('','$orderid','$cid','$brandname','$pitem[$i]','$rate[$i]','$quantity[$i]','$total[$i]','$cname',$pname[$i])";
      $sql=mysqli_query($conn,$q);
    }

  }

}
if(isset($_POST['back']))
{
  
    header("Location:order.php");
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

    <title>Stock Management System</title>

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
    
      <div class="navbar-brand" style="text-align:left; height=2px; width=5px;"><?php echo " @! : " .$_SESSION["login_user"]."</p>" ?></div> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      <ul class="nav navbar-nav navbar-right">        
        <li id="navDashboard"><a href="home.php"><i class="glyphicon glyphicon-dashboard"></i>  Dashboard</a></li>        
         <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class=" glyphicon glyphicon-bitcoin"></i> Brand<span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="addbrand.php"> <i class="glyphicon glyphicon-plus"></i>Add New Brand </a></li>            
            <li id="topNavManageOrder"><a href="allBrand.php"> <i class="glyphicon glyphicon-trash"></i> View Brand </a></li>     
          </ul>
        </li>
    <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Product<span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="addproduct.php"> <i class="glyphicon glyphicon-plus"></i>Add New Product </a></li>            
            <!--<li id="topNavManageOrder"><a href="updateproduct.php"> <i class="glyphicon glyphicon-edit"></i> Update Product </a></li> -->
            <li id="topNavManageOrder"><a href="allproducts.php"> <i class="glyphicon glyphicon-th-list"></i> All Products </a></li>      
          </ul>
        </li>
    <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-jpy"></i> Stock <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
         <li id="navCategories"><a href="addnewpurchaseclient.php"> <i class="glyphicon glyphicon-file"></i> Add New Dealer </a></li>     
         <li id="navCategories"><a href="viewdealer.php"> <i class="glyphicon glyphicon-edit"></i> All Dealer </a></li>     
         <li id="navCategories"><a href="invest.php"> <i class="glyphicon glyphicon-plus"></i> Add Stock</a></li>
     <li id="topNavAddOrder"><a href="viewstock.php"> <i class="glyphicon glyphicon-th-list"></i>View Stock</a></li>   
                
          </ul>
        </li>      
       <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-eur"></i> Client <span class="caret"></span></a>
          <ul class="dropdown-menu">            
           <li id="navCategories"><a href="addclient.php"> <i class="glyphicon glyphicon-plus"></i> Add New Client</a></li>
      <li id="topNavLogout"><a href="numberofclient.php"> <i class="glyphicon glyphicon-th-list"></i> All Client </a></li>
            <!--<li id="topNavLogout"><a href="updateclient.php"> <i class="glyphicon glyphicon-edit"></i> Update Client Records</a></li>-->        
                        
          </ul>
        </li> 
      <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="order.php"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
            <!--<li id="topNavAddOrder"><a href="cash.php"> <i class="glyphicon glyphicon-eur"></i> Cash Bill</a></li>-->
      <li id="topNavAddOrder"><a href="manageorder.php"> <i class="glyphicon glyphicon-th-list"></i>Orders Manages</a></li>            
      <!--<li id="topNavAddOrder"><a href="cashordermanage.php"> <i class="glyphicon glyphicon-stats"></i>Cash Manages Order</a></li> -->           
                        
          </ul>
        </li> 
          <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-registration-mark"></i> Reports<span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="vender.php"> <i class="glyphicon glyphicon-list-alt"></i>&nbsp;Ladger Reports </a></li>   <li id="topNavManageOrder"><a href="productbyreport.php"> <i class="glyphicon glyphicon-edit"></i> Product By Reports</a></li>          
            <li id="topNavManageOrder"><a href="perdayreport.php"> <i class="glyphicon glyphicon-th-list"></i>Client Day By Day</a></li> 
            <!--<li id="topNavManageOrder"><a href="balancesheet.php"> <i class="glyphicon glyphicon-stats"></i> Balance Sheet </a></li>--> 
      <li id="topNavManageOrder"><a href="AllreportPerday.php"> <i class="glyphicon glyphicon-tower"></i>Statement</a></li>       
        </ul>
        </li>
     <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-rub"></i> Payments<span class="caret"></span></a>
          <ul class="dropdown-menu">            
          <li id="topNavAddOrder"><a href="receviedPayment_new.php"> <i class="glyphicon glyphicon-plus"></i>Received Payments</a></li>            
          <li id="topNavAddOrder"><a href="manageReceivedPaymentFirst.php"> <i class="glyphicon glyphicon-list-alt"></i>Manages Received Payments</a></li>   
          </ul>
        </li>
    <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="investment.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li> 
            <li id="topNavLogout"><a href="addnewuser.php"> <i class="glyphicon glyphicon-plus-sign"></i> Add New User</a></li>
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
  <!-- start Invoice-->
  <div class="container">
<div id="content">
  <div id="content-header">
  <div>
   <h3>GSTIN : 10AUGPK2480A1ZD
    <b style="text-align:center; margin-left:200px;">TAX Invoice</b>
  <span style="margin-left:250px;">Origanal Bill</span></h3>
  </div>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
      
            
          </div>
          <div class="widget-content">
            <div class="row-fluid">
      
      
              <div class="span6">
                <table class="">
                  <tbody>
          <tr>
           <td><img src="img/sanjay.png" width="200px" height="100px"></td>
          </tr>
                    <tr>
                      <td><h1>Rough Estimate</h1></td>
                    </tr>
                    <tr>
                      <td><b>Station Road Warisalignaj Nawada (Bihar)-805130</b></</td>
                    </tr>
                    <tr>
                      <td><b>WHOLESALE AND RETAIL SALES</b></td>
                    </tr>
                    <tr>
                      <td><b>Authorized Dealer Of: LAFARGE , ACC ,PRIZM & KAMDHENU TMT</b></td>
                    </tr>
                    <tr>
                      <td >Mobile : +91 9643168361</td>
                    </tr>
          <tr>
                      <td >Email : pramjit@absattech.com</td>
                    </tr>
          <tr>
                      <td >Website |URL : www.absattech.com</td>
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Date  : <?php echo $nice_date = date('Y-m-d', strtotime( $row['join_date'] ));?></h4></span></p>
         <hr style="border-width:2px;border-display:black;border-color:black;">
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
         
                    <tr>
                    <tr>
            <td class="width30">Client Name :</td>
                      <td class="width70"><strong><?php echo $cname;?> </strong></td>
                    </tr>
                    <tr>
                      <td>Client GSTIN No :</td>
                      <td><strong><?php echo $gstinno;?></strong></td>
                    </tr>
                    <!--<tr>
                      <td>HSN/SAC CODE :</td>
                      <td><strong><?php //echo $hsn;?></strong></td>
                    </tr>-->
                    <tr>
                      <td>Client Mobile Number :</td>
                      <td><strong><?php echo $mobile;?></strong></td>
                    </tr>
                  <td class="width30">Client Address:</td>
                    <td class="width70"><strong>Cliente Company name.</strong> <br>
                      <?php echo $address; ?> <br>
                      Bihar <br>
                      Contact No:<?php $mobile?> <br>
                      Email: youremail@companyname.com </td>
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
                      <th class="head0">Brand Name</th>
                      <th class="head1">Product Name</th>
                      <th class="head0 right" style="text-align:right;">Rate</th>
                      <th class="head1 right" style="text-align:right;">Quantity</th>
                      <th class="head0 right" style="text-align:right;">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
           
              <?php
                $ii=1;
             for($i=0;$i<count($pname);$i++)
             {
              $sq="select brandname from brand where brandid='".$pname[$i]."' ";
              $res=mysqli_query($conn,$sq);
              $data=mysqli_fetch_array($res);
              $brandname=$data["brandname"]; 
              $proSql="SELECT product_name from product_new where pid='".$pitem[$i]."'";
              $re=mysqli_query($conn,$proSql);
              $dataPro=mysqli_fetch_array($re);
              $product_name=$dataPro["product_name"];
            ?>
                    <tr>
          <td><?php echo $ii;?></td>
                       
                 <td><?php echo $brandname; ?></td>
               <td><?php echo $product_name ;?></td>
               <td style="text-align:right;"><?php echo $rate[$i];?></td>
               <td style="text-align:right;"><?php echo $quantity[$i];?></td>
               <td style="text-align:right;"><?php echo ($total[$i]);?></td>
             
                <?php
              $ii++; 
             }
              
              ?>
                    </tr>
                   
                    
                   
                    
          <td></td>
                      <td></td>
                      <td></td>
                      <td class="right"></td>
                      <td class="right"><b>TOTAL AMOUNT</b></td>
                      <td class="right" style="text-align:right;"><strong><?php echo ($subAmount);?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full" width="80%">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="50%" height="30%"><h4>Rs. In Words. </h4><?php include_once('amuntconverintoword.php');echo convert_number_to_words($finalAmount)." RUPESS ONLY";?></td>
                      <td class="right"><strong>Transportation </strong> <br>
             <hr>
             <strong>Discount </strong> <br>
             <hr>
             <strong>Total Amount Before Tax %</strong> <br>
             <hr>
            <strong>CGST <?php echo $sgstT; ?> %</strong> <br>
             <hr>
                        <strong>SGST <?php echo $cgstT; ?> %</strong> <br>
            <hr>
             <strong>SGST <?php echo $igstT; ?> %</strong> <br>
            <hr>
            
            
                        <strong>TOTAL AFTER TAX</strong></td>
                        <td class="right" style="text-align:right;"><strong><?php echo $trans;?> <br>
            <hr>
                        <?php echo $discount;?> <br>
            <hr>
                        <?php echo $subAmount+$trans-$discount;?> <br>
            <hr>
                        <?php echo $sgst;?> <br>
            <hr>
                        <?php echo $cgst;?> <br>
            <hr>
                        <?php echo $igst;?> <br>
            <hr>
                        <?php echo $taxamount;?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <h4><span>For M/s Sanjay Kumar </span></h4>
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
  <!-- end Invoice-->
  
      
   
    <!--<div class="container">
    <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>From: <a href="#">Your Name</a></h4>
                  </div>
                  <div class="panel-body">
                    <p>
                      Client Mobile Number _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  <br>
                      Client GSTIN No._ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  <br>
                      Client Full Address _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                    </p>
                  </div>
                </div>
        </div>
    <div class="col-md-6">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>From: <a href="#">Your Name</a></h4>
                  </div>
                  <div class="panel-body">
                    <p>
                      Client Mobile Number _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  <br>
                      Client GSTIN No._ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  <br>
                      Client Full Address _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>
                    </p>
                  </div>
                </div>
        </div>
        
      </div>
    <!-- / end client details section -->

     <!-- <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-cente"><h4>S.No.</h4></th>
            <th class="text-cente"><h4>BRAND NAME</h4></th>
            <th class="text-cente"><h4>PRODUCT NAME</h4></th>
            <th class="text-cente"><h4>HRS/QNT</h4></th>
            <th class="text-cente"><h4>RATE/PRICE</h4></th>
            <th class="text-cente"><h4>SUB TOTAL</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
      <td></td>
            <td>Article</td>
            <td><a href="#">Title of your article here</a></td>
            <td class="text-right">-</td>
             <td class="text-right">$200.00</td>
              <td class="text-right">$200.00</td>
          </tr>
          <tr>
      <td></td>
            <td>Template Design</td>
            <td><a href="#">Details of project here</a></td>
            <td class="text-right">10</td>
             <td class="text-right">75.00</td>
              <td class="text-right">$750.00</td>
          </tr>
          <tr>
      <td></td>
            <td>Development</td>
            <td><a href="#">WordPress Blogging theme</a></td>
            <td class="text-right">5</td>
             <td class="text-right">50.00</td>
              <td class="text-right">$250.00</td>
          </tr>
       <tr>
       <td></td>
            <td>Development</td>
            <td><a href="#">WordPress Blogging theme</a></td>
            <td class="text-right">5</td>
             <td class="text-right">50.00</td>
              <td class="text-right">$250.00</td>
          </tr>
       <tr>
       <td></td>
             <td>Development</td>
             <td><a href="#">WordPress Blogging theme</a></td>
             <td class="text-right">5</td>
             <td class="text-right">50.00</td>
             <td class="text-right">$250.00</td>
          </tr>
       <tr>
       <td></td>
         <td class="text-right"></td>
         <td class="text-right"></td>
         <td class="text-right"></td>
         <td class="text-right"></td>
         <td class="text-right"><hr></td>
       </tr>
       <tr>
       <td></td>
            <td></td>
            <td></td>
            <td ></td>
             <td class="text-right">TOTAL AMOUNT</td>
              <td class="text-right">$250.00</td>
          </tr>
      <tr>
      <td></td>
            <td></td>
            <td></td>
            <td ></td>
             <td class="text-right">SGST 14%</td>
              <td class="text-right">$250.00</td>
          </tr>
      <tr>
      <td></td>
            <td></td>
            <td></td>
            <td ></td>
             <td class="text-right">CGST 14%</td>
              <td class="text-right">$250.00</td>
          </tr>
       <tr>
       <td></td>
            <td></td>
            <td></td>
            <td ></td>
             <td class="text-right">TOTAL AFTER TAX</td>
              <td class="text-right">$250.00</td>
          </tr>
       <tr>
       <td></td>
            <td></td>
            <td></td>
            <td >Rs. In Words.</td>
             <td class="text-right"></td>
              <td class="text-right"></td>
          </tr>
      <tr>
      <td></td>
        <td><hr></td>
      <td></td>
      <td></td>
      <td></td>
      <td><p>For : M/s Sanjay Kumar<br></p>
      <br></br>
      Authorized Signature </td>
       
      </tr>
        </tbody>
      </table>
</div>-->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!--<div class="container">
       <div align="right">
     <button type="button" name="add" id="add" class="btn btn-active" onclick="window.print()"><span class="glyphicon glyphicon-download-alt"></span>&nbsp; PRINT </button>
     
       <button type="button" name="back" id="back" class="btn btn-danger" value="click"><span class="glyphicon glyphicon-fast-backward"></span>&nbsp; BACK </button>
      </div>
           <div class="bill">
         <center>
         <div class="row">
            <div class="col-md-12">
                     <img src="img/sanjay.png" width="150px" height="100px"><br>
           <span>Station road warisaliganj  Nawada  Bihar 805130<br><b>Email :</b>Sanjaykumarlaf9934@gmail.com, <span><b> Mobile :</b> +91 9934903470 </span><br><b>GSTIN : 10AUGPK2480A1Zd</b></p></span>
          
           
          </div>
          
                  </div>
          </center>
         <h3><center><b><u>Invoice</u></b></center></h3>
            <div class="row">
            <div class="col-md-12">
                     <table border="1" width="100%">
            <tr>
             <th ><span><center><h5><b>Client Details :</b></h5></center></span></th>
             </tr>
             </table>
             <table border="1" width="100%">
            <tr>
              
            <td>&nbsp;&nbsp;Client Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $cname;?> </td><td>&nbsp;&nbsp;Bill Number &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $orderid;?> </td>
            </tr> 
            <tr>
            <td>&nbsp;&nbsp;Client Number &nbsp:&nbsp;&nbsp;&nbsp; <?php echo $mobile;?> </td><td>&nbsp;&nbsp;Invoice Date :&nbsp;&nbsp;&nbsp;<?php echo $date;?> </td>
            </tr>
            <tr>
            <td>&nbsp;&nbsp;Client Address :&nbsp;&nbsp;&nbsp;<?php echo $address;?> </td><td>&nbsp;&nbsp;Client ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cid;?>  </td>
            
             </tr>
             

             
           
           </table>
           <tr>
           

          
          </div>
                  </div>
          
          <h4 style="padding:2px;border-radius:2px"> &nbsp;&nbsp;Products Discription</h4>
          <table class="table" width="20%">
                <tr>
              
              <th>Brand Name</th><th>Product Name</th><th>Rate</th><th>QNT</th><th style="text-align:right;">Amount</th>
              
              </tr>
              
              
              
              <?php
          
             for($i=0;$i<count($pname);$i++)
             {
              $sq="select brandname from brand where brandid='".$pname[$i]."' ";
              $res=mysqli_query($conn,$sq);
              $data=mysqli_fetch_array($res);
              $brandname=$data["brandname"]; 
            ?>
                   <tr>
                 <th><?php echo $brandname; ?></th><th><?php echo $pitem[$i];?></th><th><?php echo $rate[$i];?></th><th><?php echo $quantity[$i];?></th><th style="text-align:right;"><?php echo ($total[$i]);?></th>
              </tr>
                <?php
               
             }
              
              ?>
              
               <tr>
                 <th></th><th></th><th></th><th style="padding-left: 10em; };">Sub Amount</th><th style="text-align:right;"><?php echo ($subAmount);?></th>
              </tr>
             
               
              <tr>
                 <th></th><th></th><th></th><th style="padding-left: 10em; };">SGST TAX 14% :</th><th style="text-align:right;"><?php echo ($sgst);?></th>
              </tr>
                  <tr>
              <tr>
                 <th></th><th></th><th></th><th style="padding-left: 10em; };">CGST TAX 18% :</th><th style="text-align:right;"><?php echo ($cgst);?></th>
              </tr>
              <tr>
                 <th></th><th></th><th></th></th><th style="padding-left: 10em; };"> &nbsp;IGST TAX 28% :</th><th style="text-align:right;"><?php echo ($igst);?></th>
              </tr>
              <tr>
                 <th></th><th></th><th></th><th style="padding-left: 10em; };">Total Amount</th><th style="text-align:right;"><?php echo ($finalAmount);?></th>
              </tr>
              <tr>
                 <th >Total Amount In Words</th><th style="text-align:right;"><?php include_once('amuntconverintoword.php');echo convert_number_to_words($finalAmount)." RUPESS ONLY";?></th><th></th> <th></th><th>
              </tr>
             
            
            
              
              
              
          </table>-->
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
    window.location.href = 'order.php';
  }
  </script>
  </body>
</html>