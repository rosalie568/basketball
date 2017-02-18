<?php
	ini_set('max_execution_time', 20*60);
	session_start();
?>
<!DOCTYPE html>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=2" />
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="css/mainStyleSheet.css" />
	</head>
	<body>
		<div class="navBar">
			<ul>
				<li><a href="first.php">Home</a></li>
				<li><a href="setGame.php">Create a Game</a></li>
				<li><a class="active" href="searchGame.php">Join a Game</a></li>
				<li><a href="myGame.php">View My Game</a></li>
				<li><a href="googlemap.php">Directions to Game</a></li>
			</ul>
			<a href="logOut.php" class="button"><span>
				  <?php
						include 'include.php';		//get values for database

						$con = mysql_connect($dbhost, $dbuser, $dbpass);
						mysql_select_db($dbname) or die( 'error connecting to database' );

						$check = mysql_query("
							SELECT *
							FROM  student
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;

						$row2 = mysql_fetch_array($check);

						echo $row2['firstName'];
				?>
			</span>Sign Out </a>
		</div>
		<div class="container">
			<div class="grad"></div>

			<div class="header">
				<div>Search For <br><span>A Game</span></div>
			</div>
			<br>
			<div class="login">
				<form action="viewGame.php" method="post">
					<select name="location" >
					  <option value="">--Select a location--</option>
					  <?php

						  //search query for locations
						  $locations = mysql_query("
							  SELECT * FROM gameLocations ") ;

						  while($row = mysql_fetch_array($locations) )
						  {
					  ?>
						<option value="<?php echo $row['gameLocation']?>"> <?php echo $row['gameLocation']?> </option>

					  <?php
							  ;
						  }
					  ?>
					</select>
					<button type="submit" value="create" name="create" id="create">Search For a Game</button>	<p>
				</form>
			</div>
		</body>
</html>
