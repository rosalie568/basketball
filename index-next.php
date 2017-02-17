<?php

	ini_set('max_execution_time', 20*60);

	include 'include.php';		//get values for database

	//get values from signUp.html form
	$password = $_POST['password'];
	$email = $_POST['email'];

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	function SignIn()
	{
		session_start();   //starting the session for user profile page
		if(!empty($_POST['email']) && !empty($_POST['password']) )   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
		{
			$query = mysql_query("SELECT *  FROM student where email = '$_POST[email]' AND password = '$_POST[password]'") ;
			$row = mysql_fetch_array($query);

			if(!empty($row['email']) AND !empty($row['password']))
			{
				//$session_register("email");//Deprecated
				$_SESSION['email']= $_POST['email'];

				//check if status is a student
				if($row['status'] == "student")
					header("Location: first.php");
				//checks if status is an admin
				else
					header("Location: adminFirst.html");
			}
			else
			{
				header("Location: failLogin.html");
			}
		}
		//if one or both values are empty display fail login page
		else
		header("Location: failLogin.html");
	}

	SignIn();
?>
