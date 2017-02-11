<?php
	session_start();   //starting the session for user profile page
	
	include 'include.php';		//get values for database
	
	$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database
	
	//Austin Commit 4/27 11:51pm to test database select function
	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
	//End Commit 4/27
	
	$getTime = $_POST['getTime'];
	$location = $_POST['location'];
			
	//prints message if any connect to mySQL
	if (!$db) {
		 echo "Error - Could not connect to MySQL";
		 exit;
	}
			
	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
	if (!$er) {
		print "Error - Could not select the cars database";
		exit;
	}
	
	echo $getTime;
	
	//check if Date and time of game is set
	if(!empty($getTime) )
	{
		//check if location is set
		if($location != "")
		{
			$myEmail = $_SESSION['email'];	//email from the session
		
			//insert data into database
			$query = mysql_query("INSERT INTO gameName (createdBy, gameTime, location) VALUES ('$myEmail','$getTime', '$location')" );
												
			//select data from student database								
			$check = mysql_query("
							SELECT * 
							FROM  student 
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;
							
			$row = mysql_fetch_array($check);
			
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			$email = $row['email'];
			
			$query2 = mysql_query("INSERT INTO gameRegistered (playerFirstName, playerLastName, playerEmail) VALUES ('$firstName', '$lastName', '$email' )");
			
			header("Location: first.php");			//goes back to first page
		}
		//Location is not set
		else
			header("Location: invalidCreateData.html");			//goes back to gameCreate page
	}
	//Date and time of game are not set alert user
	else
		header("Location: invalidCreateData.html");			//goes back to gameCreate page
	
?>