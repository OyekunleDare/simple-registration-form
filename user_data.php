<?php
	if(isset($_POST['submit'])){
		//get the form data into variables
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = strtotime($_POST['dob']);
		$newdate = date("d/m/Y", $dob);
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		
		//give the csv file a heading
		$csvfile = "./userdata.csv";
		$filename = fopen($csvfile, "r+");
		$form = array("Name", "Email", "Date of Birth", "Gender", "Country");
		fputcsv($filename,$form);
		fclose($filename);
		
		//store the variables in an array and insert into the csv file
		$formdata = array($name, $email, $newdate, $gender, $country);
		$file = fopen($csvfile, "a");				
		fputcsv($file,$formdata);
		fclose($file);
		
		//open the csvfile and print it out as an array
		$data = fopen($csvfile, "r");
		$user_data = fread($data, filesize($csvfile));
		print_r($user_data);
		fclose($data);
	}
?>
