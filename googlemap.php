<!DOCTYPE html>
<?php
	session_start();

	include 'include.php';		//get values for database

	$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database

	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
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
		  <div class="body"></div>
		<div class="container">
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

			<div class="grad"></div>
			<div class="header">
				<div>Directions to <br><span>Your Game </span></div>

			</div>
			<br>
			<div class="login">


				<a href="firstplace.php" >		<input type="button" value="MTSU Campus Recreation"></a>
				<a href="secondplace.php" > <input type="button" value="YMCA of Middle Tennessee">
			<a href="thirdplace.php" >	<input type="button" value="Patterson Park Community">
</a>			</div>

	</body>
</html
