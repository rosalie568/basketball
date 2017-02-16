<!DOCTYPE html>
<?php
	session_start();

	include 'include.php';		//get values for database

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	if(isset($_GET['delete_id']))
	{
		//delete only the person who is clicking on game
		mysql_query ("DELETE FROM gameRegistered WHERE gameId = " . $_GET['delete_id'] );

		mysql_query ("DELETE FROM gameName WHERE gameId = " . $_GET['delete_id'] );

		header("Location: adminFirst.html");
	}

?>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=2" />
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<link rel="stylesheet" type="text/css" href="js/jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="css/mainStyleSheet.css" />
		<script type="text/javascript">
			function delete_id(id)
			{
				 if(confirm('Are you sure you want to delete this game?'))
				 {
					window.location.href='deleteGame.php?delete_id='+id;
				 }
			}
		</script>
	</head>
	<body>
		<div class="navBar">
			<ul>
				<li><a href="adminFirst.html">Home</a></li>
				<li><a class="active" href="deleteGame.php">Delete Game</a></li>
				<li><a href="MinMax.html">Change # of Players</a></li>
			</ul>
		</div>
		<div class="container">
		<a href="logOut.php" class="button"><span>Admin </span>Sign Out</a>
			<div class="grad"></div>

			<div class="header">
				<div>Delete <br><span> A Game</span></div>
			</div>
			<br>
			<div class="login">
				<div class= "t">
				<table border>
					<tr>
						<th><h2>Id </h2></th>
						<th><h2>Time </h2></th>
						<th><h2>Location </h2></th>
						<th><h2># Players Registered </h2></th>
						<th><h2>Delete </h2></th>
					</tr>
				<?php

					$date = date('Y/m/d H:i');		//get current day and time

					$query = mysql_query(" SELECT * FROM  gameName
					                       WHERE gameTime <= '" . $date . "'
										   ORDER BY gameTime ASC ");		//search database

					//get the rows that match the query
					while($row = mysql_fetch_array($query))
					{
						$gameId = $row['gameId'];		//save Id that will be used in delete
						echo "<tr>";
							echo "<td>" . $row['gameId'] . "</td>";
							echo "<td>" . $row['gameTime'] . "</td>";
							echo "<td>" . $row['location'] . "</td>";
							echo "<td>" . $row['playersRegistered'] . "</td>";
				?>
							<td><a href="javascript:delete_id(<?php echo $row['gameId']; ?>)"> <input type="submit" name="delete" id="delete" value="Delete" /></a> </td>
				<?php
						echo "</tr>";
					}

				?>

				</table>
			</div>
</div>
	</body>

/html>
