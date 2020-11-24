
<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("education_school", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
 $name=$_POST['full_name'];
  $email=$_POST['email'];
  $mobile=$_POST['contect_no'];
  $address=$_POST['address'];
  $subject=$_POST['subject'];
 $subject_class=$_POST['subject_class'];
 $master_degree=$_POST['master_degree'];
 $role=$_POST['role'];
if($name !=''||$email !=''){
//Insert Query of SQL
$query = mysql_query("INSERT INTO `table_techer`(`fname`, `email`, `contect_no`, `address`, `subject`, `subject_class`, `master_degree`, `role`) VALUES ('$name','$email','$mobile','$address','$subject','$subject_class','$master_degree','$role')");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
header("location:user-list.php");
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server
?>