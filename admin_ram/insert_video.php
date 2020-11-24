<?php
include("config.php");
if(isset($_POST['submit']))
{
        $name = $_FILES['file']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'] /1024/1024;
        $random_name = rand();
        $tmp = $_FILES['file']['tmp_name'];
print_r($extension);
exit();
        
        if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
        {
          $message= "Video Format is not supported !";
          
          }elseif($size >= 20971520)
        {
          $message="File must not greater than 20mb";
        }else
        {
  move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);
  $class =$_POST['class'];
  $Subject =$_POST['Subject'];
  $title =$_POST['title'];
  $metadescription =$_POST['metadescription'];
  $Descrption =$_POST['Descrption'];
 $timeduration =$_POST['timeduration'];
 $class_id =$_POST['class_id'];

  }
   $query="INSERT INTO `vid_entry` VALUES ('','$name','$random_name.$extension','$class','$Subject','$title','$metadescription','$Descrption','$timeduration')"; //die;    
 $result = mysqli_query($counts,$query);
print_r($query);
exit();
if($query)
{
	 echo  "Record Saved Successfully";
     // sleep(5);
//header("Location: register.php");
      header("location:services-list.php");

	echo "Record saved succefully";
}
else
{
	echo "Record not saved";
}
}

?>