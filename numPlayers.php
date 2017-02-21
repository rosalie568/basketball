<?php
	ini_set('max_execution_time', 20*60);
	include 'include.php';		//get values for database

	//connecting to the database
	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	$min = $_POST['Min'];
	$max = $_POST['Max'];

	if( !empty($min) && !empty($max) )
	{
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
	}
	else {
		header("Location: minMaxError.html");			//goes back to gameCreate page
	}
?>
