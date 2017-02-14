<!DOCTYPE html>
<?php
	session_start();

	include 'include.php';		//get values for database

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	if(isset($_GET['delete_id']))
	{
		//delete only the person who is clicking on game
		mysql_query ("DELETE FROM gameRegistered WHERE playerEmail = '" . mysql_real_escape_string($_SESSION['email']) . "'
					  AND gameId = " . $_GET['delete_id'] );

		$query2 = mysql_query("SELECT * FROM gameName where gameId = " . $_GET['delete_id'] );
		$row2 = mysql_fetch_array($query2);

		//if # of players Registered = 1 then delete whole game information
		if( $row2['playersRegistered'] == 1)
			mysql_query("DELETE FROM gameName WHERE gameId =".$_GET['delete_id'] );

		//else decrease the number of players by 1
		else
		{
			$newPlayers = $row2['playersRegistered'] - 1;
			mysql_query("UPDATE gameName SET playersRegistered = $newPlayers
						 WHERE gameId = " . $_GET['delete_id'] );
		}

		header("Location: first.php");
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
				 {s
					window.location.href='myGame.php?delete_id='+id;
				 }
			}
		</script>
	</head>
	<body>

		<div class="body"></div>
		<div class="container">
			<a href="" class="button>"> Hi
			</a>
			<a href="logOut.php" class="button">
				<span>
						<?php

							$check = mysql_query("
								SELECT *
								FROM  student
								WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;

							$row2 = mysql_fetch_array($check);

							echo $row2['firstName'];
						?>
					</span>Sign Out </a>
				</div>
			<div class="grad"></div>

			<div class="header">
				<div>View Your <br><span>Games</span></div>
			</div>
			<br>
			<div class="login">
					<center>
				<div class="t">
				<table border>
					<tr>
						<th><h2>Time </h2></th>
						<th><h2>Location </h2></th>
						<th><h2># Players Registered </h2></th>
						<th><h2>Delete </h2></th>
					</tr>

				<?php

					//select games that the person login has created
					$query = mysql_query(" SELECT * FROM  gameName, gameRegistered
										   WHERE gameRegistered.playerEmail = '" . mysql_real_escape_string($_SESSION['email']) . "'
										   AND gameRegistered.gameId = gameName.gameId
										   ORDER BY gameName.gameTime ASC ") ;

					//get the rows that match the query
					while($row = mysql_fetch_array($query))
					{
						echo "<tr>";
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
</center>
				</div >
	</body>

</html>
