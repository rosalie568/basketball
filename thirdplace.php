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
		<link rel="stylesheet" type="text/css" href="mainStyleSheet.css" />
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
						
						$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database
						
						//prints message if cant connect to my user name database
						$er = mysql_select_db($dbuser); // in your local host
						
						$check = mysql_query("
							SELECT * 
							FROM  student 
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;
					
						$row2 = mysql_fetch_array($check);
						
						echo $row2['firstName'];?>
						</span>Sign Out</a> </div>
		<center>
		<br><br><br><br><br><br>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3234.387815389269!2d-86.381968!3d35.839493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8863f85e6c318297%3A0x4454a6bd2aaef896!2sPatterson+Park+Community+Center!5e0!3m2!1sen!2sus!4v1430877316488" width="600" height="450" frameborder="0" style="border:0"></iframe>
		<br><br><br><br><br><br>
		<div class="grad"></div>
			<div class="header">
			
			</div>
		</center>
	</div>
	</body>
</html>