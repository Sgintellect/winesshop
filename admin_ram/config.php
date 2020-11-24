 <?php
$host="localhost";
$user ="root";
$password ="";
$database ="modelshop";
$counts = mysqli_connect($host, $user,$password,$database);
if(!$counts)
    { 
    die("connection failed:" . mysqli_connect_error());

    }

?> 