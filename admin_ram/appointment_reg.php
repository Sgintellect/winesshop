<?php
 
include 'include/config.php';
include 'include/functions.php';




if(isset($_POST['submit'])){
	//print_r($_POST); die;
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$location=$_POST['location'];
 $appoindate= $_POST['appoindate']; //die;
$optradio=$_POST['optradio'];
$services = $_POST['services'];

   $sql=$obj->query("insert into tbl_appointment set name='$name',email='$email',phone='$phone',services ='$services',location='$location',date='$appoindate',gender='$optradio',status=1",-1); //die;

$result=mysqli_query($obj,$sql);
 if($result===TRUE){
 	echo "<script>alert('thankyou')</script>";
 }else{
 	echo "<script>alert('please insert again data not inserted')</script>";
 }
 $to = "support@deepanjalisalon.com";
 $subject = "Appointment Detail";
 $to = "info@deepanjalisalon.com";
 $message = '<table>
 <tr>
 <td>Name</td>
 <td>'.$name.'</td>
 </tr>
 <tr>
 <td>Email</td>
 <td>'.$email.'</td> 
 </tr>
 <tr>
 <td>Phone</td>
 <td>'.$phone.'</td> 
 </tr>
 <tr>
 <td>Location</td>
 <td>'.$location.'</td>
  </tr>
 <tr>
 <td>Appointment Date</td>
 <td>'.$appoindate.'</td>
 </tr>
 <tr>
 <td>Gender</td>
 <td>'.$optradio.'</td>
  </tr>
</table>';

 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: <info@gmail.com>' . "\r\n";
 $headers .= 'Cc: myboss@example.com' . "\r\n";
 mail($to,$subject,$message,$headers);
 header('location:appointment-list.php');


}
?>