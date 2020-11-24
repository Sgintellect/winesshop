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

include ('include/config.php');
include ('include/functions.php');


$cid =  $obj->escapestring($_POST['cid']);
$Whr="";

if ($_POST['cid']) {

  $cid=$_POST['cid'];
  $Whr.=" and mobile like '%$cid%'";
} 


if(isset($_POST['submit'])){  

  $firstname  = $_POST['firstname'];
  $bname      = $_POST['bname'];
  $email      = $_POST['email'];
  $address    = $_POST['address'];
  $gst        = $_POST['gst'];
  $service    = implode(',',$_POST['service']); 
  $quantity   = $_POST['quantity'];
  $price      = $_POST['price'];
  $amount     = $price+($price*$gst/100); 
  $sql      = $obj->query("insert into tbl_payment set cname='$firstname',bname='$bname',
    service='$service',quantity='$quantity',price='$price',total_amount='$amount',gst='$gst',status=1",-1);

  $lastid   = $obj->lastInsertedId();  

  header('location:billprint.php?id='.$lastid.'');

}
if(isset($_POST['search']))
{
  $odid=rand();
  $cid=$_POST['cid'];
  $sql= $obj->query("select * from $tbl_user where  1=1 $Whr",-1);
  /*$q=mysqli_query($conn,$sql);*/
  if($row=$obj->fetchNextObject($sql))
  {

    $cid     = $row->id;
    $cname   = $row->fname;$row->lname;
    $cnumber = $row->mobile;
    $address = $row->address;
    $gstno   = $row->cgstno;
    $hsnno   = $row->chsnno;          
  }
  else 
    {  $msg="Recored NoT Present";   }

}?>

<html>
<?php include("head.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1><?php if($_REQUEST['id']==''){?> Add <?php }else{?> Update <?php }?> Services</h1>
        <ol class="breadcrumb">
          <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
          <!--  <li><a href="invoiceform.php">View Invoice List</a></li> -->
        </ol>
      </section>
      <section class="content">
        <div class="box box-primary">
          <form name="frm" id="servicefrm" method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="submitForm" value="yes" />
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />        
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="glyphicon glyphicon-check"></i>Service Details</div>
                      <div class="orderdetail">
                        <form action="" method="POST">
                          <center>   
                            <table class="table1">
                              <tr>
                                <td>Client Number</td><td><p style="color:red;"> <?php echo $msg;?></p></td>
                                <td colspan="4">
                                  <?php 

                                  $result=$obj->query("select * from $tbl_user where  1=1",-1);
                                  
                                  ?>
                                  <input type="text" name="cid" class="form-control">
                                  </td>
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
                              <td colspan="2"><input type="text" name="name" value="<?php echo $cname;?>" class="form-control"></td>

                              <td>Client ID </td>
                              <td colspan="1"><input type="text" name="cid" value="<?php echo $cid;?>" readonly class="form-control"></td> 
                              <td>Client GSTIN No.</td> 
                              <td colspan="2"><input type="text" name="gstinno" value="<?php echo $gstno;?>" class="form-control"></td> 
                            </tr>                  
                            <tr>
                              <td>Client Number</td>
                              <td colspan="2"><input type="number" name="mobile" value="<?php echo $cnumber;?>" class="form-control"></td>

                              <td>Order No</td>
                              <td colspan="4"><input type="text" name="orderid" value="<?php echo $odid; ?>" class="form-control" readonly="true" ></td>
<!-- <td>HSN/SAC CODE</td> 
  <td colspan="2"><input type="text"  name="hsn" value="<?php echo $hsnno; ?>" class="form-control"></td> -->

</tr>

<tr>
  <td>Date</td>
  <td colspan="2">
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
  <td colspan="2"><input type="text" name="address"  value="<?php echo $address;?>" class="form-control" ></td>              
</tr>                             
</table>  
         
<div class="row">          
  <div class="col-md-2">
    <div class="form-group"  >
      <label>Category </label>
      <select class="form-control" required id="productname2" name="category[]" >
       <option value="">Select 	Category </option>
       <?php
       $service=$obj->query("select * from product_new where 7=7");
       while($line=$obj->fetchNextObject($service)){ ?>
        <option value="<?php echo $line->pid ?>"><?php echo $line->category; ?></option>
      <?php } ?>
    </select>
  </div>
  
</div>
<div class="row">          
  <div class="col-md-2">
    <div class="form-group"  >
      <label>PRODUCT </label>
      <select class="form-control" required id="productname1" name="productid[]" >
       <option value="">Select Service </option>
       <?php
       $service=$obj->query("select * from product_new where 7=7");
       while($line=$obj->fetchNextObject($service)){ ?>
        <option value="<?php echo $line->pid ?>"><?php echo $line->product_name; ?></option>
      <?php } ?>
    </select>
  </div>
  
</div>




<div class="col-md-2">
  <div class="form-group">
    <label>RATE :</label>
    <div class="input-group">
      <input type="text" class="form-control" name ="rate[]" id="rate1" onkeyup="sum1(1);" required placeholder="Enter Rate"/>
    </div>

  </div>
</div>
<div class="col-md-2">
  <div class="form-group">
    <label>QTY</label>
    <div class="input-group">          
      <input type="text" class="form-control" name ="qty[]" id="qty1" required  onkeyup="sum1(1);" placeholder="Enter Quantity" />
    </div>
  </div>
</div>
<div class="col-md-2">
  <div class="form-group">
    <label>AMOUNT</label>
    <div class="input-group" width="50">

      <input type="text" class="form-control" name ="amount[]" value="0.00" id="amount1" required placeholder="Enter Full Name"   readonly="true"/>
    </div>
  </div>
</div>

<div class="col-md-2">
  <div class="form-group">
  <div class="input-group" width="50">
    <label>ADD: REMOVE</label><br>
    <input type="button" onclick="addElement()" class="btn btn-success" value="+">&nbsp;&nbsp;<input type="button" onclick="removeElement()"class="btn btn-danger" value="-">
</div>
  </div>
</div>
</div>
<div id="content1" ></div>
<div class="row">
  <div class="col-md-4">
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
  <div class="col-md-4">
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
  <div class="col-md-4">
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
     <input type="submit" name="submit" value="Save" class=" btn btn-success"> 
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
</form>
</div>
</section>
</div>
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
    $("#servicefrm").validate();
  })
</script>

<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.validate.min.js"></script>
<script src="js/select2.full.min.js"></script>

<script type="text/javascript">
  function calcPrice(val){
    var price=document.getElementById('price').value; 
    var gst=document.getElementById('gst').value;
    var r= price*gst/100; 
    document.getElementById('total_amount').value = +r +  +price;   }    
</script>

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
  newTBDiv.innerHTML = "<div class='row'><div class='col-md-2'><div class='form-group'><select class='form-control' required id=productname2" + intTextBox + " name='category[]'><option value=''>Select category </option><?php $service=$obj->query("select * from product_new where 1=1");while($line=$obj->fetchNextObject($service)){ ?>  <option value='<?php echo $line->pid ?>'><?php echo $line->category; ?></option> <?php } ?></select></div><div class='form-group'><select class='form-control' required id=productname1" + intTextBox + " name='productid[]'><option value=''>Select Service </option><?php $service=$obj->query("select * from product_new where 1=1");while($line=$obj->fetchNextObject($service)){ ?>  <option value='<?php echo $line->pid ?>'><?php echo $line->product_name; ?></option> <?php } ?></select></div></div><div class='col-md-2'><div class='form-group'><div class='input-group'><input type='text' class='form-control' name ='rate[]' id=rate" + intTextBox + " onkeyup='sum1("+intTextBox+");' required placeholder='Enter Rate'/> </div></div></div><div class='col-md-2'><div class='form-group'><div class='input-group'><input type='text' class='form-control' name ='qty[]' id=qty" + intTextBox + " required  onkeyup='sum1("+intTextBox+");' placeholder='Enter Quantity' /></div></div></div><div class='col-md-2'><div class='input-group'><div class='input-group-addon'><i class='fa fa-inr'></i></div><input type='text' class='form-control' name ='amount[]' id=amount" + intTextBox + " required placeholder='Enter Amount'  readonly='true'/></div></div><div class='col-md-2'><div class='form-group'><input type='button' onclick='addElement()' class='btn btn-success' value='+'>&nbsp;&nbsp;<input type='button' onclick='removeElement()'class='btn btn-danger' value='-'></div></div></div>";
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
// var samount= document.getElementById('workcharge').value;
var damount= document.getElementById('discount').value;

var amt =parseFloat(famount)-parseFloat(damount);
var result=amt.toFixed(2);
//alert(result);
if(!isNaN(result)){
  document.getElementById('grandamount').value =result;
  document.getElementById('finalamount').value =result;

}
}
function Caldiscount(){ 

  var famount= document.getElementById('subamount').value;
//var samount= document.getElementById('workcharge').value;
var damount= document.getElementById('discount').value;
var amt =parseFloat(famount)-parseFloat(damount);
var result=amt.toFixed(2);
if(!isNaN(result)){

  document.getElementById('grandamount').value =result;
  document.getElementById('finalamount').value =result;

}
}
function Caltax(){ 
  var grand1 =parseInt(document.getElementById('grandamount').value);
  var sgst = parseInt(document.getElementById('sgst').value);
//alert(sgst);
var cgst = parseInt(document.getElementById('cgst').value);
//alert(cgst);
//var igst = parseInt(document.getElementById('igst').value);

if(sgst<=14 )
{
  var ttax=sgst+cgst;
  var tax=grand1*ttax/100;
  var result=grand1+tax;

}else if(cgst<=14)
{
  var ttax=sgst+cgst;
  var tax=grand1*ttax/100;
  var result=grand1+tax;
}else if(igst<=28)
{
  var ttax=sgst+cgst;
  var tax=grand1*ttax/100;
  var result=grand1+tax;

}else{
  alert("Invalied Tax Please Enter Correct Tax"); }

var result1=result.toFixed(2);
document.getElementById('finalamount').value=result1;
}

function Caladvpayment(){
  var famount= document.getElementById('finalamount').value;
  var aamount= document.getElementById('advancepayment').value;
  var calPay=parseFloat(famount)-parseFloat(aamount);
  var result=calPay.toFixed(2);
  if(!isNaN(result)){

    document.getElementById('dueamount').value =result;  }

}
</script>
</body>
</html>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</body>
</html>

