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
			.login input[type=button]{
				width: 270px;
				height: 90px;
				background: white;
				border: 1px solid #fff;
				cursor: pointer;
				border-radius: 2px;
				color: #a18d6c;
				font-family: 'Exo', sans-serif;
				font-size: 16px;
				font-weight: 400;
				padding: 6px;
				margin-top: 10px;
			}

			.login input[type=button]:active{
				opacity:10;
			}

		</style>
	</head>
	<body>

		<div class="body"></div>
			<div class="container">
			<a href="logOut.php" class="button"><span>
					<?php
						include 'include.php';		//get values for database

						$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database

						//prints message if cant connect to my user name database
						$er = mysql_select_db($dbuser); // in your local host

						$check = mysql_query("
							SELECT *
							FROM  student
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;

						$row2 = mysql_fetch_array($check);

						echo $row2['firstName'];
					?>
				</span>Sign Out </a>
			<div class="grad"></div>
			<div class="header">
				<div>Make Your <br><span>selection</span></div>
			</div>
			<br>
			<div class="login">

				<a href="setGame.php" >		<input type="button" value="Create A Game"></a>
				<a href="searchGame.php" >		<input type="button" value="Join A Game"></a>
				<a href="myGame.php" >		<input type="button" value="View My Game"></a>
				<a href="googlemap.php" >	<input type="button" value="Directions To The Game"></a>
			</div>

	</body>
</html>
