<?php

mysql_connect ("localhost", "root", "");
mysql_select_db("jmspublicschool");

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
 $subject=$_POST['subject'];

mysql_query("UPDATE `subject` SET `subject`='$subject'  WHERE id='$id'");
}

header( 'Location: subject_list.php' ) ;


?>