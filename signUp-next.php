<?php
	ini_set('max_execution_time', 20*60);
	session_start();   //starting the session for user profile page

	include 'include.php';		//get values for database

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname) or die( 'error connecting to database' );

	function SignUp()
	{
		//get values from signUp.html form
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$password = $_POST['password'];
		$pwd2 = $_POST['passwordConf'];
		$email = $_POST['email'];
		$phoneNum = $_POST['phoneNum'];

		if( !empty($firstName) && !empty($lastName) && !empty($email) && !empty($pwd2) && !empty($password) )   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
		{
			//checks to make sure passwords match
			if($password == $pwd2)
			{
				//check value in firstName
				if (preg_match('/^[A-Za-z]*$/', $firstName, $matches) )
				{
					//check value in last Name
					if (preg_match('/^[A-Za-z]*$/', $lastName, $matches) )
					{
						// check value in email
						if (preg_match('/^[A-Za-z0-9._%+-]*@[A-Za-z.-]*[A-Za-z]{2,4}$/', $email, $matches) )
						{
							// check value in phoneNum
							if (preg_match('/^[0-9]{3} [0-9]{3}-[0-9]{4}$/', $phoneNum, $matches) || $phoneNum == "" )
							{
								$query = mysql_query("SELECT *  FROM student where email = '$_POST[email]'") ;
								$row = mysql_fetch_array($query) ;

								//if email is in database go to invailidEmail page
								if(!empty($row['email']) )
								header("Location: invalidEmail.html");			//goes back to signUp page
								else
								{

									// insert values into database
									$sql="INSERT INTO student (firstName, lastName, password, email, phoneNum)
									VALUES ('$firstName', '$lastName', '$password', '$email', '$phoneNum')";

									mysql_query($sql);			//sends query to database
									header("Location: RegComplete.html");			//goes to enterValues.html page
								}
							}
							//invalid PhoneNum
							else
							header("Location: enterValues.html");			//goes to enterValues.html page
						}
						//invalid email
						else
						header("Location: enterValues.html");			//goes to enterValues.html page
					}
					//invalid lastName
					else
					header("Location: enterValues.html");			//goes to enterValues.html page */
				}
				//invalid firstName
				else
				header("Location: enterValues.html");			//goes to enterValues.html page
			}
			//invalid password
			else
			header("Location: passwordInvalid.html");			//goes to passwordInvalid.html

		}
		//if one or both values are empty display fail login page
		else
		header("Location: enterValues.html");			//goes to enterValues.html page
	}

	SignUp();

?>
