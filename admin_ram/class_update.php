<?php
include("config.php");
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
$class=$_POST['class'];


      $sql=mysqli_query($counts, "UPDATE `student_registation` SET class='$class' WHERE class_id='$id'");
header( 'Location: class_list.php' );
}



?>