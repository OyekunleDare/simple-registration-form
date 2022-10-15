<?php
	if(isset($_POST['submit'])){
		//get the form data into variables
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = strtotime($_POST['dob']);
		$newdate = date("d/m/Y", $dob);
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		
		
		$csvfile = "./userdata.csv";
		$filename = fopen($csvfile, "a");
		$formdata = array($name, $email, $newdate, $gender, $country);
					
		fputcsv($filename,$formdata);
		fclose($filename);
		
		print_r($formdata);
		
	}
?>
