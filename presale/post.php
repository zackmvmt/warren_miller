<?php

	//show all errors
	error_reporting(E_ALL); 
	ini_set( 'display_errors','1');

	//include the necessary file
	include_once "includes/config.php";
	
	//get the values from javascript
	$email = strtolower($_REQUEST['email']);
	$zip = $_REQUEST['zip'];
	
	//if they have already entered the contest
	if(mysql_num_rows(mysql_query("SELECT email FROM email_capture WHERE email = '$email'"))){
	
		//email adress already exists...do nothing
		echo "exists";
		
	} else {
	
		//otherwise...they have not entered into the contest yet...enter their info
	
		$insert = mysql_query("INSERT INTO email_capture (email, zip) VALUES('$email', '$zip')");
		
		//if the insert (into the database) was successful
		if($insert) {
		
			echo "success";
			
		}
		
		//otherwise the insert did not work
		else {
		
			echo "error" . '<br />'; 
			
		}
	}

?>