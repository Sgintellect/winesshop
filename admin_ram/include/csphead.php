<?php 
	
	// including db config file
	include_once './config/db-config.php';

	// including import controller file
	include_once './controllers/import-controller.php';

	// creating object of DBController class
	$db              =    	new DBController();

	// calling connect() function using object
    $conn            =    	$db->connect();

    // creating object of import controller and passing connection object as a parameter
	$importCtrl      =    	new ImportController($conn);

?>