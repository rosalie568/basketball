<?php
	session_start();
	session_destroy();		//destroy session

	//delete cookie for location
	if(isset($_COOKIE['location'])) {
		  unset($_COOKIE['location']);
		  setcookie('location', '', time() - 3600); // empty value and old timestamp
	}

	header("Location: index.html");

?>
