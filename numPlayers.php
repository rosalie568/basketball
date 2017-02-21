<?php
	ini_set('max_execution_time', 20*60);
	include 'include.php';		//get values for database

	//connecting to the database
	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	$max = $_POST['Max'];

	if( !empty($max) )
	{
		if( preg_match('/^[0-9]+$/', $max, $matches) )
		{
			$query = mysql_query(" SELECT * FROM  numPlayers ") ;		//search database

			$row = mysql_fetch_array($query);

			//get values from database on min and max # of players
			$oldMax = $row['maxPlayers'];

			//get new values formax
			$newMax = $_POST['Max'];

			mysql_query("UPDATE numPlayers SET maxPlayers = $newMax");

			header("Location: adminFirst.html");			//goes back to gameCreate page
		}
		else{
			header("Location: minMaxError.html");			//goes back to gameCreate page
		}
	}
	else {
		header("Location: minMaxError.html");			//goes back to gameCreate page
	}
?>
