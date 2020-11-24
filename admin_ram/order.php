<?php
$odid="";
$cname="";
$msg="";
$cnumber="";
$cid="";
$daten="";
$user="";
$address="";
$gstno="";
$hsnno="";
include("include/config.php");
	  session_start();
	  /*if(!$_SESSION["login_user"]){
		 header("location:index.php?notlogedin=You are not Log in !"); 
	  }*/
		   if(isset($_POST['search']))
		   {
			   $odid=rand();
			   $cid=$_POST['cid'];
			   $sql="select * from client where id='$cid' or name='$cid'";
			   $q=mysqli_query($conn,$sql);
			   if($row=mysqli_fetch_assoc($q))
				{
					$cid=$row['id'];
				    $cname=$row['name'];
				    $cnumber=$row['number'];
					$address=$row['address'];
					$gstno=$row['cgstno'];
					$hsnno=$row['chsnno'];
					
					}
					 else 
			        {    
				    $msg="Recored NoT Present"; 
				   }
			   
			
			   
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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
			<style>
		       .table1 tr td
			    {
			       
				   padding:6px;
				   
			   }
			   .orderdetail
			   {
				   border:1px solid gray;
				  padding:5px;
			   }
		  </style>
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
    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
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
    </div> -->
    <!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>Order Details 
			</div>
				     <div class="orderdetail">
					  <form action="" method="POST">
					  						    <center>	 
						 <table class="table1">

							   <tr>
							    <td>Client Name</td><td><p style="color:red;"> <?php echo $msg;?></p></td>
									 <td colspan="4"><select name="cid" id="cname" >
									 <option>----Select Client Name ----</option>
							          <?php 
									  include_once("connection.php");
									  
									   $result=mysqli_query($conn,"select id,name from client");
									  while($row=mysqli_fetch_assoc($result))
									  {
										  ?><option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
										  <?php }  ?>									  												 						  
									 				  									  
									  </select></td>
									 <td colspan="4">									       
									     <input type="submit" name="search" value="Search Client" class=" btn btn-success">									      
									  </td>
							   </tr>							 
						 </table>
						  </center>					 
						</form>				
													                             
						 <form action="billprint.php"  name="sclient" method="POST">
						  <table class="table">
						  <tr>
							        <td>Client name</td>
							        <td colspan="4"><input type="text"   name="name" value="<?php echo $cname;?>" class="form-control"></td>
									
							        <td>Client ID </td>
							        <td colspan="1"><input type="text"  name="cid" value="<?php echo $cid;?>" readonly class="form-control"></td>
							        <td>Client GSTIN No.</td> 
							        <td colspan="2"><input type="text"  name="gstinno" value="<?php echo $gstno;?>" class="form-control"></td>

							   </tr>
							    
									<tr>
							        <td>Client Number</td>
							        <td colspan="4"><input type="number" name="mobile" value="<?php echo $cnumber;?>" class="form-control"></td>
									 
							        <td>Order No</td>
							        <td colspan="4"><input type="text" name="orderid" value="<?php echo $odid; ?>" class="form-control" readonly="true" ></td>
							       <!-- <td>HSN/SAC CODE</td> 
							        <td colspan="2"><input type="text"  name="hsn" value="<?php echo $hsnno; ?>" class="form-control"></td>
-->
							  
							  
							   </tr>
							   <tr>
							   <td>Date</td>
								<td colspan="4">
								  <div class="form-group" style="width:100%">
			     					<div class="input-group">
									  <input type="text" class="form-control" name ="from_date" id="from_date" value="<?php echo date('d-m-Y');?>"   placeholder="Enter Mobile Number" />
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									</div><!-- /.input group -->
								
							 </div>
									</td>
							         <td>Address :</td>
							        <td colspan="4"><input type="text" name="address"  value="<?php echo $address;?>" class="form-control" ></td>
						  
							   </tr>
													   
						  </table>
						  
				<div class="row">
				  <div class="col-md-2">
				   <div class="form-group" >
                      <label> BRAND</label>
                      <select class="form-control" required id="brandid1" name="brandid[]" onchange="getproduct(this.value,1);">
					  <option value="">Select Brand Status</option>
					  <?php 
					  $sql="SELECT brandid,brandname FROM `brand` WHERE STATUS=1 order by brandname";
					  $q=mysqli_query($conn,$sql);
					  $i=1;
                      while($row=mysqli_fetch_assoc($q)){ 
						echo '<option value='.$row['brandid'].'>'.$row['brandname'].'</option> '; 
					  }
					  ?>
                    </select>
                    </div>
				 </div>
				 <div class="col-md-2">
					<div class="form-group"  >
                      <label>PRODUCT </label>
                      <select class="form-control" required id="productname1" name="productid[]" >
					  <option value="">Select Product </option>

                        </select>
                    </div>
				 </div>
	

				  <div class="col-md-2">
                    <div class="form-group">
                    <label>RATE :</label>
                    <div class="input-group">

                      <input type="text" class="form-control" name ="rate[]" id="rate1" onkeyup="sum1(1);" required placeholder="Enter Rate"/>
                    </div><!-- /.input group -->
                  </div>
				 </div>
				 <div class="col-md-2">
                    <div class="form-group">
                    <label>QTY</label>
                    <div class="input-group">

					
                      <input type="text" class="form-control" name ="qty[]" id="qty1" required  onkeyup="sum1(1);" placeholder="Enter Quantity" />
                    </div><!-- /.input group -->
                  </div>
				 </div>
				 <div class="col-md-2">
                    <div class="form-group">
                    <label>AMOUNT</label>
                    <div class="input-group" width="50">

                      <input type="text" class="form-control" name ="amount[]" value="0.00" id="amount1" required placeholder="Enter Full Name"   readonly="true"/>
                    </div><!-- /.input group -->
                  </div>
				 </div>
				 
				 <div class="col-md-2">
                    <div class="form-group">
                    <label>ADD: REMOVE</label><br>
                    <input type="button" onclick="addElement()" class="btn btn-success" value="+">&nbsp;&nbsp;<input type="button" onclick="removeElement()"class="btn btn-danger" value="-">
					
                  </div>
				 </div>
				 </div>
				<div id="content1" ></div>
				<div class="row">
				   <div class="col-md-3">
                    <div class="form-group">
                    <label>Sub Total Amount :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="subamount" id="subamount"  readonly required value="0.0" />
                    </div>
                  </div>
				 </div>
				 <!-- <div class="col-md-3">
                    <div class="form-group">
                    <label>Transpotation</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="trans" id="workcharge" value="0.0" onkeyup="Calworkcharges();"/>
                    </div>
                  </div>
				 </div> -->
				  <div class="col-md-3">
                    <div class="form-group">
                    <label>Discount</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="discount" id="discount" value="0.0" onkeyup="Caldiscount()";/>
                    </div>
                  </div>
				 </div>
				 <div class="col-md-3">
                    <div class="form-group">
                    <label>Grand Amount:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="grandamount" id="grandamount" readonly value="0.0"/>
                    </div>
                  </div>
				 </div>
				 </div>
				 <div class="row">
				   <div class="col-md-3">
                    <div class="form-group">
                    <label>SGST % </label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="sgst" id="sgst" required value="0.0" onkeyup="Caltax()";/>
                    </div>
                  </div>
				 </div>
				 <div class="col-md-3">
                    <div class="form-group">
                    <label>CGST % </label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="cgst" id="cgst" value="0.0" onkeyup="Caltax()";/>
                    </div>
                  </div>
				 </div>
				 <!-- <div class="col-md-3">
                    <div class="form-group">
                    <label>IGST % </label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="igst" id="igst" value="0.0" onkeyup="Caltax()";/>
                    </div>
                  </div>
				 </div> -->

				 <div class="col-md-3">
                    <div class="form-group">
                    <label>Final Amount:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-inr"></i>
                      </div>
                      <input type="text" class="form-control" name ="finalamount" id="finalamount"  READONLY value="0.0"/>
                    </div>
                  </div>
				 </div>
				 </div>
								<table class="table1">
								 <tr>
								   <td colspan="4" align="">
									       <input type="submit" name="submit" value="Save Order" class=" btn btn-success"> 
                                           <input type="reset" name="reset" value="Reset" class=" btn btn-primary">
									  </td>
								 </tr>
								 <tr>
								    
								     
								      
								 </tr>
						  </table>
						  </form>
					 </div>
				</div>
		   </div>
  </div>
  </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/datepicker.js"></script>
 
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
</script>
	<script type="text/javascript">
	var intTextBox=1;
	var amt='';
	var totalAmt=0;
	//FUNCTION TO ADD TEXT BOX ELEMENT
	function addElement()
	{
	intTextBox = intTextBox + 1;
	var contentID = document.getElementById("content1");
	var newTBDiv = document.createElement("div");
	newTBDiv.setAttribute("id","strText"+intTextBox);
	newTBDiv.innerHTML = "<div class='row'><div class='col-md-2'><div class='form-group'><select class='form-control' required id=brandid" + intTextBox + " name='brandid[]' onchange='getproduct(this.value," + intTextBox + ");'><option value=''>Select Brand Status</option><?php $sql="SELECT brandid,brandname FROM `brand` WHERE STATUS=1 order by brandname";$q=mysqli_query($conn,$sql);$i=1;while($row=mysqli_fetch_assoc($q)){ echo '<option value='.$row['brandid'].'>'.$row['brandname'].'</option> '; }?></select></div></div><div class='col-md-2'><div class='form-group'><select class='form-control' required id=productname" + intTextBox + " name='productid[]' ><option value=''>Select Product </option></select></div></div><div class='col-md-2'><div class='form-group'><div class='input-group'><input type='text' class='form-control' name ='rate[]' id=rate" + intTextBox + " onkeyup='sum1("+intTextBox+");' required placeholder='Enter Rate'/> </div></div></div><div class='col-md-2'><div class='form-group'><div class='input-group'><input type='text' class='form-control' name ='qty[]' id=qty" + intTextBox + " required  onkeyup='sum1("+intTextBox+");' placeholder='Enter Quantity' /></div></div></div><div class='col-md-2'><div class='input-group'><div class='input-group-addon'><i class='fa fa-inr'></i></div><input type='text' class='form-control' name ='amount[]' id=amount" + intTextBox + " required placeholder='Enter Amount'  readonly='true'/></div></div><div class='col-md-2'><div class='form-group'><input type='button' onclick='addElement()' class='btn btn-success' value='+'>&nbsp;&nbsp;<input type='button' onclick='removeElement()'class='btn btn-danger' value='-'></div></div></div>";
	//newTBDiv.innerHTML = "<input type=’text’ id='" + intTextBox + "‘ name='" + intTextBox + "‘>";
	contentID.appendChild(newTBDiv);
	}

	//FUNCTION TO REMOVE TEXT BOX ELEMENT
	function removeElement()
	{
	if(intTextBox != 0)
	{
	var contentID = document.getElementById("content1");
	contentID.removeChild(document.getElementById("strText"+intTextBox));
	intTextBox = intTextBox-1;
	}
	}
    function sum1(cntt) 
    { 
	   var totalAmt=0;
	    
        var rate = document.getElementById('rate'+cntt).value;
        var qnt = document.getElementById('qty'+cntt).value;
    
        var re = parseFloat(rate) * parseFloat(qnt);
		amt=re.toFixed(2);
		if(!isNaN(amt)){
            document.getElementById('amount'+cntt).value = amt;
			var n = $("input[name^='amount']").length;
			for(i=1;i<=n;i++)
			{
		     var subAmt = document.getElementById('amount'+i).value;
			 totalAmt = parseFloat(totalAmt)+ parseFloat(subAmt);
			}
            document.getElementById('subamount').value = totalAmt.toFixed(2);
            document.getElementById('grandamount').value =totalAmt.toFixed(2);
            document.getElementById('finalamount').value = totalAmt.toFixed(2);
        }
	}
function getproduct(productid,cntt){
	
		var id=productid;
		$.ajax({
	    url: "fetch.php",
        type: "POST",
        data : {pid :id },
        success: function (data) {
             //alert(data);    
           $('#productname'+cntt).html(data);			   

        },
			
		});

	}

 function Calsubamount(cntt){ 
 
        var famount= document.getElementById('amount'+cntt).value;
        var samount= document.getElementById('subamount').value;
	    var amt = parseFloat(samount)+parseFloat(famount);
		var result=amt.toFixed(2);
	    if(!isNaN(result)){
            document.getElementById('subamount').value =result;
            document.getElementById('grandamount').value =result;
            document.getElementById('finalamount').value =result;

        }
	}
	 function Calworkcharges(){ 
 
        var famount= document.getElementById('subamount').value;
        var samount= document.getElementById('workcharge').value;
        var damount= document.getElementById('discount').value;
    
	    var amt = parseFloat(samount)+parseFloat(famount)-parseFloat(damount);
		var result=amt.toFixed(2);
	    if(!isNaN(result)){
            document.getElementById('grandamount').value =result;
            document.getElementById('finalamount').value =result;

        }
	}
function Caldiscount(){ 
 
        var famount= document.getElementById('subamount').value;
        var samount= document.getElementById('workcharge').value;
        var damount= document.getElementById('discount').value;
	    var amt = parseFloat(samount)+parseFloat(famount)-parseFloat(damount);
		var result=amt.toFixed(2);
	    if(!isNaN(result)){

            document.getElementById('grandamount').value =result;
            document.getElementById('finalamount').value =result;

        }
	}
	function Caltax(){ 
 	var grand1 =parseInt(document.getElementById('grandamount').value);
	var sgst = parseInt(document.getElementById('sgst').value);
	var cgst = parseInt(document.getElementById('cgst').value);
	var igst = parseInt(document.getElementById('igst').value);
	if(sgst<=14 )
	{
		var ttax=sgst+cgst+igst;
		var tax=grand1*ttax/100;
		var result=grand1+tax;
		
	}else if(cgst<=14)
	{
		var ttax=sgst+cgst+igst;
		var tax=grand1*ttax/100;
		var result=grand1+tax;
	}else if(igst<=28)
	{
		var ttax=sgst+cgst+igst;
		var tax=grand1*ttax/100;
		var result=grand1+tax;
		
	}else
	{
		alert("Invalied Tax Please Enter Correct Tax");
	}
	
	 var result1=result.toFixed(2);
	 document.getElementById('finalamount').value=result1;
}

function Caladvpayment(){
  var famount= document.getElementById('finalamount').value;
  var aamount= document.getElementById('advancepayment').value;
  var calPay=parseFloat(famount)-parseFloat(aamount);
  		var result=calPay.toFixed(2);
	    if(!isNaN(result)){

            document.getElementById('dueamount').value =result;


        }
  
}


	</script>
  </body>
</html>


