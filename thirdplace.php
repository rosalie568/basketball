<!DOCTYPE html>
<?php
	session_start();
?>
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
	  <div class="body">
		<div class="container">
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

						echo $row2['firstName'];?>
						</span>Sign Out</a> </div>
		<center>
		<br><br><br><br><br><br>
		<iframe src="https://www.google.com/maps/place/Tilles+Park/@38.6208212,-90.3672158,17z/data=!3m1!4b1!4m5!3m4!1s0x87d8b59aa63e7c95:0x85b2512e6e2ae27b!8m2!3d38.6208212!4d-90.3650271" width="600" height="450" frameborder="0" style="border:0"></iframe>
		<br><br><br><br><br><br>
		<div class="grad"></div>
			<div class="header">

			</div>
		</center>
	</div>
	</body>
</html>
