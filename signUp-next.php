<?php

			include 'include.php';		//get values for database

			//get values from signUp.html form
			$password = $_POST['password'];
			$email = $_POST['email'];
		/*
			$db = mysql_connect($dbhost, $dbuser, $dbpass);		//connect to database

			//prints message if any connect to mySQL
			if (!$db) {
				 echo "Error - Could not connect to MySQL";
				 exit;
			}

			//prints message if cant connect to my user name database
			$er = mysql_select_db($dbuser); // in your local host
			if (!$er) {
			print "Error - Could not select the cars database";
			exit;
			}
		*/
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
