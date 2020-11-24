<?php
include('conn.php');

if($_POST['id']){
	 $id=$_POST['id'];

	if($id==0){
		echo "<option>Select City</option>";
		}else{
			$sql = mysqli_query($dbcon,"SELECT * FROM `cities` WHERE state_id='$id'");
			while($row = mysqli_fetch_array($sql)){
				echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
				}
			}
		}
?>