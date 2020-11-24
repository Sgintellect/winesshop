<?php

include ('include/config.php');
include ('include/functions.php');

if(isset($_POST['submit'])){  
$firstname=$_POST['firstname'];
$bname=$_POST['bname'];
$email=$_POST['email'];
$address=$_POST['address'];
$gst=$_POST['gst'];
$service= $_POST['service'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
 $amount= $price+($price*$gst/100); 
$sql=$obj->query("insert into tbl_payment set cname='$firstname',bname='$bname',
  service='$service',quantity='$quantity',price='$price',total_amount='$amount',gst='$gst',status=1",-1);
echo $lastid =$obj->lastInsertedId();  
header('location:invoice.php?id='.$lastid.'');




}

 ?>

<div class="row" style="width: 700px; height: 10px; padding-left: 300px; ">
  <div class="col-50">
    <div class="container" >
      <form action="" method="POST">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Customer Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Enter Name">
            <label for="fname"><i class="fa fa-user"></i> Beaution Name</label>
            <input type="text" id="bname" name="bname" placeholder="Enter Name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Email email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Enter address">              
            <label for="city"><i class="fa fa-institution"></i> Services</label>
            <input type="text" id="service" name="service" placeholder="Enter Service">
            <label for="city"><i class="fa fa-institution"></i>Quantity</label>
            <input type="text" id="quantity" name="quantity" placeholder="Enter quantity">         
            <label for="city"><i class="fa fa-institution"></i> Price</label>
             <input type="text" id="quantity" name="price" placeholder="Enter Price">
             <label for="city"><i class="fa fa-institution"></i> Gst</label>
             <input type="text" id="gst" name="gst" placeholder="">

             
                     
          </div>          
        </div>
               <!-- <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label> -->
        <input type="submit" value="Submit" class="btn" name="submit">
      </form>
    </div>
  </div>  
</div>
<style>
  .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>