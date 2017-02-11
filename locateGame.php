<!DOCTYPE html>
<?php
	session_start();
	
	include 'include.php';		//get values for database
						
	$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database
						
	//prints message if cant connect to my user name database
	$er = mysql_select_db($dbuser); // in your local host
	
	$check = mysql_query("
							SELECT * 
							FROM  student 
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;
					
	$row2 = mysql_fetch_array($check);
	
	//insert game data into the database for (JOINING a GAME!!!)
	if(isset($_GET['join_id']))
	{
		//store values of user
		$firstName = $row2['firstName'];
		$lastName = $row2['lastName'];
		$email = $row2['email'];
		$getId = $_GET['join_id'];
		
		// insert values into database
		$sql=mysql_query( "INSERT INTO gameRegistered (gameId, playerFirstName, playerLastName, playerEmail) 
					VALUES ('$getId', '$firstName', '$lastName', '$email')" );
					
		//search database											
		$query2 = mysql_query(" SELECT * FROM  gameName
							    WHERE gameId = " . $_GET['join_id'] );
								
		$row3 = mysql_fetch_array($query2);
					
		//update # of players Registered
		$newPlayers = $row3['playersRegistered'] + 1;
		
		mysql_query("UPDATE gameName SET playersRegistered = $newPlayers
						 WHERE gameId = " . $_GET['join_id'] );
		
		header("Location: first.php");		//goes back to first.php page after player joins a game
	}
?>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=2" /> 
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="mainStyleSheet.css" />
		
		<script type="text/javascript">
			function join_id(id)
			{
				 if(confirm('Are you sure you want to join this game?'))
				 {
					window.location.href='locateGame.php?join_id='+id;
				 }
			}
		</script>
		
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
						
						echo $row2['firstName'];?>
						</span>Sign Out</a>
						
			<div class="grad"></div>
			
			<div class="header">
				<div>Join A <br><span>Game</span></div>
			</div>
			<br>
			<div class="login">
<div class="t" >
				<table border>
					<tr>
						<th><h2>Id </h2></th>
						<th><h2>Time </h2></th>
						<th><h2>Location </h2></th>
						<th><h2># Players Registered </h2></th>
						<th><h2>Join </h2></th>
					</tr>
				<?php
				
					//search database											
					$query = mysql_query(" SELECT * FROM  gameName, gameRegistered, numPlayers 
										   WHERE gameName.location = '" . mysql_real_escape_string($_COOKIE['location']) . "'
										   AND gameName.gameId = gameRegistered.gameId
										   AND gameRegistered.playerEmail != '" . mysql_real_escape_string($_SESSION['email']) . "'
										   AND gameName.playersRegistered <= numPlayers.maxPlayers
										   ORDER BY gameName.gameTime ASC ");		
										   
					//get the rows that match the query
					while( $row = mysql_fetch_array($query) )
					{
						//stops players from registering for same game twice
						$query4 = mysql_query(" SELECT * FROM gameRegistered
												WHERE playerEmail = '" . mysql_real_escape_string($_SESSION['email']) . "'
												AND gameId = " . $row['gameId'] );	 
											
						$row4 = mysql_fetch_array($query4);
						
						if( empty($row4) )
						{
							if( $row4['gameId'] != $row['gameId'] )
							{
									echo "<tr>";
										echo "<td>" . $row['gameId'] . "</td>";
										echo "<td>" . $row['gameTime'] . "</td>";
										echo "<td>" . $row['location'] . "</td>";
										echo "<td>" . $row['playersRegistered'] . "</td>";
										
					?>
								<td><a href="javascript:join_id(<?php echo $row['gameId']; ?>)"> <input type="submit" name="join" id="join" value="Join" /></a> </td>
					<?php
									echo "</tr>";	
							}
								
						}
						else 
						{
							while ( $row4 =  mysql_fetch_array($query4) )
							{
								if( $row4['gameId'] != $row['gameId'] )
								{
									echo "<tr>";
										echo "<td>" . $row['gameId'] . "</td>";
										echo "<td>" . $row['gameTime'] . "</td>";
										echo "<td>" . $row['location'] . "</td>";
										echo "<td>" . $row['playersRegistered'] . "</td>";
										
					?>
								<td><a href="javascript:join_id(<?php echo $row['gameId']; ?>)"> <input type="submit" name="join" id="join" value="Join" /></a> </td>
					<?php
										echo "</tr>";		
								}
							}
						}
					}
					
					?>
					
					
				</table>
			</div>
</div>
	</body>

</html>
