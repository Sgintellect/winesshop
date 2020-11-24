<?php
include("include/config.php");
echo $product_id=$_POST["product_id"];
 
   $result=mysqli_query($conn,$sql);
   $output='<tr>';
   $i=1;
    $sql= "select * from product_new where 1=1 and pid='$product_id'";
    $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
      //print_r($row);
   $newDate =$row['cr_date'];
   $rdate = date("d-m-Y", strtotime($newDate));
   
   $output.='<td>'.$i.'</td>';
   $output.='<td>'.$row['product_name'].'</td>';
   $output.='<td>'.$row['price'].'</td>';
  // $output.='<td>'.$row['quantity'].'</td>';
   //$output.='<td>'.$row['amount'].'</td>';
   //$output.='<td>'.$row['name'].'</td>';
   //$output.='<td>'.$rdate.'</td>';
   $output.='<td>'.$rdate.'</td>';
   $output.='<tr>';
   $i++;
   }
   
   echo $output;

?>