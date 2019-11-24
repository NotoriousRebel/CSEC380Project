<?php
	/*
	Date: 10/10/2019
	Description: This is an intentionally vulnerable script to handle basic authentication
		     of a user on MemeTube. 
	*/

	include("common.php");
	sleep(1);
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// POST params
		$username = $_POST['user'];
		$password = $_POST['pass'];

		// The query to look for the users creds
		$query = "SELECT * FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $username . "'";
		// result is an object
		$result = mysqli_query($conn,$query);
		// get the number of rows returned
		$num = mysqli_num_rows($result);

		// Check to see if the user pass combo is in the db
		if ($num > 0){
			while ($row = $result->fetch_assoc()){
				if (password_verify($password, $row['Password'])){
					$_SESSION['loggedin_user'] = $username;
					header("location: landing.php");
				} else {
					header("location: index.html?error=credentialsIncorrect");
				}
			}
		}
		else{
			header("location: index.html?error=credentialsIncorrect");
			exit();
		}
	}
?> 