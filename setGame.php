<!DOCTYPE html>
<?php
	session_start();
?>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=2" />
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<link rel="stylesheet" type="text/css" href="js/jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="css/mainStyleSheet.css" />
	</head>
	<body>
		<div class="body"></div>
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

						echo $row2['firstName'];
				?>
						</span>Sign Out</a>
			<div class="grad"></div>

			<div class="header">
				<div>Build Your <br><span>Game</span></div>
			</div>
			<br>
			<div class="login">
				<form action="createGame.php" method="post">
					<table>
						<tr>
							<td> <h3>Date and Time: </h3> </td>
							<td><input type="datetime-local" name="getTime" /> </td>
						</tr>
						<tr>
							<td colspan="2">
								<select name="location">
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
							</td>
						</tr>
						<tr>
							<td colspan="2"> <button type="submit" value="create" name="create" id="create">Create A Game</button> </td>
						</tr>
					</table>
				</form>
			</div>
		</body>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script>

		$('#datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			lang:'en',
			startDate:	'2014/01/05'
		});
		$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

		$('.some_class').datetimepicker();
		$('.someclass2').timepicker();
		$('#default_datetimepicker').datetimepicker({
			formatTime:'H:i',
			formatDate:'d.m.Y',

			defaultTime:'10:00',
			timepickerScrollbar:false
		});

		$('#datetimepicker10').datetimepicker({
			step:5,
			inline:true
		});

	</script>
</html>
