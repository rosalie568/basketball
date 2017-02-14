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
						</span>Sign Out
				</a>
			</div>
			<center>
			<br><br><br><br><br><br>


			<div id="map" style="width:400px;height:400px;background:yellow"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2), zoom: 10
  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOxG0tfSdwP0edBROnZHdbZgnLqaHqehA&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: http://www.w3schools.com/graphics/google_maps_basic.asp
-->


			<div class="grad"></div>
			<div class="header">

			</div>
		</center>
	</div>
	</body>
</html>
