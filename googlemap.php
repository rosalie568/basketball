<?php
	ini_set('max_execution_time', 20*60);
	session_start();

	include 'include.php';		//get values for database

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=2" />
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<title>BALL MAJORS</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyleSheet.css" />
		<style>
			.header{
			position: absolute;
			top: calc(70% - 35px);
			left: calc(50% - 255px);
			z-index: 5;
			}
		</style>
	</head>
	<body>
		<div class="navBar">
			<ul>
				<li><a href="first.php">Home</a></li>
				<li><a href="setGame.php">Create a Game</a></li>
				<li><a href="searchGame.php">Join a Game</a></li>
				<li><a href="myGame.php">View My Game</a></li>
				<li><a class="active" href="googlemap.php">Directions to Game</a></li>
			</ul>
			<a href="logOut.php" class="button"><span>
			<?php
					$check = mysql_query("
							SELECT *
							FROM  student
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;

						$row2 = mysql_fetch_array($check);

						echo $row2['firstName'];
			?>
			</span>Sign Out</a>
		</div>
		<div class="container">
			<div class="grad"></div>
			<div class="header">
				<div>Directions to <br><span>Your Game </span></div>
			</div>
			<br>
			<div class="login">
				  <a href="firstplace.php"> <input type="button" value="Tilles Park" /> </a>
				  <a href="secondplace.php"> <input type="button" value="Conway Park" /> </a>
				  <a href="thirdplace.php"> <input type="button" value="C4 Competitive Park" /> </a>

			</div>

	</body>
</html
