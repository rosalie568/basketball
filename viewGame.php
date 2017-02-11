<?php
	include 'include.php';		//get values for database
						
	$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database
						
	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
	
	$location = $_POST['location'];			//get location from user selection
	
	//check if location is set
	if($location != "")
	{
		setcookie("location", $location);	//sets cookie
	
		header("Location: locateGame.php");			//goes back to invalidViewData page	
	}
	//Location is not set
	else
		header("Location: invalidViewData.html");			//goes back to invalidViewData page
	

?>