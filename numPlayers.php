<?php
	include 'include.php';		//get values for database
						
	$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database
						
	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
	
	$query = mysql_query(" SELECT * FROM  numPlayers ") ;		//search database
	
	$row = mysql_fetch_array($query);	
	
	//get values from database on min and max # of players
	$oldMin = $row['minPlayers'];
	$oldMax = $row['maxPlayers'];
	
	//get new values for min and max
	$newMin = $_POST['Min'];
	$newMax = $_POST['Max'];
	
	mysql_query("UPDATE numPlayers SET minPlayers = $newMin, maxPlayers = $newMax");

	header("Location: adminFirst.html");			//goes back to gameCreate page

?>