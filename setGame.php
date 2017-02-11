<!DOCTYPE html>
<?php
	session_start();
?>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=2" /> 
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="mainStyleSheet.css" />
	</head>
	<body>	
		<div class="body"></div>
		<div class="container"> 
			<a href="logOut.php" class="button"><span><?php	
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
						</span>Sign Out</a>
			<div class="grad"></div>
			
			<div class="header">
				<div>Build Your <br><span>Game</span></div>
			</div>
			<br>
			<div class="login">
				<form action="createGame.php" method="post">
					<input type="text" class="some_class" value="" id="some_class_1" name="getTime" placeholder="Pick date and time " >
					<br><br>
					<select name="location">
					  <option value="">--Select a location--</option>
					  <option value="Murphy Center">Murphy Center</option>
					  <option value="Murfreesboro YMCA">Murfreesboro YMCA</option>
					  <option value="Patterson Park Community Center">Patterson Park Community Center</option>
					</select>
					<button type="submit" value="create" name="create" id="create">Create A Game</button>	
				</form>	
			</div>
		</body>
<script src="./jquery.js"></script>
<script src="./jquery.datetimepicker.js"></script>
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
