<?php
	ini_set('max_execution_time', 20*60);
	session_start();
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
				<li><a href="googlemap.php">Directions to Game</a></li>
			</ul>
		</div>
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
						</span>Sign Out
				</a>
			</div>
			<center>

			<br><br><br><br><br><br><br>
			<center><h1>Tilles Park</h1></center>
			<div id="googleMap" style="width:50%;height:400px;"></div>

			<div class="grad"></div>
			<div class="header">

			</div>
		</center>
	</div>

	<script>
		function myMap() {
			var myLatlng = new google.maps.LatLng(38.6208212, -90.3672158 );
			var mapProp= {
				center: myLatlng,
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);


			var marker = new google.maps.Marker({
		        position: myLatlng,
		        map: map,
	        	title:"Hello World!"
	    	});

		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnFdsxMvi_VzLp9Pe6Cje9Fuo3V6J7Zqc&callback=myMap"></script>

	</body>

</html>
