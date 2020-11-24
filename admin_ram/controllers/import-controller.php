<?php
class ImportController {
// getting connection in constructor
function __construct($conn) {
$this->conn =$conn;
}
// function for reading csv file
		public function index() {
$fileName = "";
// if there is any file
if(isset($_FILES['file'])){

	        	// reading tmp_file name
	    		$fileName =$_FILES["file"]["tmp_name"];
	        }
$counter =  0;	 


			// if file size is not empty
	        if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {   
            $file =  fopen($fileName, "r");			        
		        // eliminating the first row of CSV file
			    fgetcsv($file);  ?>

			    <table class="table">
			    	<thead>
			    		<th>ID </th>
			    		<th>State</th>
			    		<th>Distict</th>
			    		<th>Catogery </th>
			    		<th> Shop Name </th>
			    		<th>Aadibhar </th>
			    		<th>Partibhoot </th>
						<th>Lotory Free Amount </th>
			    	</thead>
			        
		        <?php 
		        	while (($column = fgetcsv($file, 10000, ",")) !== FALSE) { 

			            $counter++;	   

			            // assigning csv column to a variable
	        	 		$shop_name      =  $column[0];
						$Shop_landmark   =  $column[1];
	        	 		$Licence_free   =  $column[2];
	        	 		$Addibhar =$column[3];
						$security_ammount =$column[4];
	        	 		$lottery_fre =$column[5];
	                

	                	// inserting values into the table
	                	$sql ="INSERT INTO `tbl_district`(`shop_name`, `Shop_landmark`, `Licence_free`, `Addibhar`, `security_ammount`, `lottery_fre`) VALUES ('$shop_name','$Shop_landmark','$Licence_free','$Addibhar','$security_ammount','$lottery_fre')";
	                	print_r($sql);
						exit();
						
						$result =$this->conn->query($sql);

	                	if($result == 1): ?>                		
	                    		<tr>
									<td> <?php echo $state; ?> </td>
									<td> <?php echo $district; ?> </td>
									<td> <?php echo $catogery; ?> </td>
									<td> <?php echo $shop_name; ?> </td>
									<td> <?php echo $addibar; ?> </td>
									<td> <?php echo $patibhoot; ?> </td>
									<td> <?php echo $lootery_ammount; ?> </td>
											
	     							<td> <?php echo "<label class='text-success'>Success </label> " .date('d-m-Y H:i:s');?> </td>
								</tr>
	                	<?php endif;
				}
				 ?>
				</table>

				<?php
			}

		else{
		}
	}	

}

?>