<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = strtotime($_POST['dob']);
		$newdate = date("d/m/Y", $dob);
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		
		
		$filename = fopen("userdata.csv", "r+");
		$form = array("Name", "Email", "Date of Birth", "Gender", "Country");
		fputcsv($filename,$form);
		fclose($filename);
		
		$formdata = array($name, $email, $newdate, $gender, $country);
		$file = fopen("userdata.csv", "a");
				
		fputcsv($file,$formdata);
		fclose($file);
		
		$csvfile = "./userdata.csv";
		$data = fopen($csvfile, "r");
		$user_data = fread($data, filesize($csvfile));
		print_r($user_data . "\n");
		fclose($data);
	}
?>