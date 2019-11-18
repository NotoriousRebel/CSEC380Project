 <?php
	/*
	Date: 10/10/2019
	Description: This is an intentionally vulnerable script to handle creatting new
				 accounts for meme tube.
	Blind SQL Injection: "a' OR 1=1 -- "
	*/

	include("common.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// POST params
		$username = $_POST['user'];
		$password = $_POST['pass1'];
		$password_2 = $_POST['pass2'];

		// check if passwords match
		if ($password != $password_2){
			// redirect back to the login page with a status code 421
			//header('Location: ' . $_SERVER['HTTP_REFERER'], 421);
			exit("Passwords don't match");
		}

		if ($username == "" || $password == "" || $password_2 == "") {
			exit("Make sure no fields are blank");
		}

		$query_username = "SELECT * FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $username . "'";
		$response = mysqli_query($conn, $query_username);
		$num = mysqli_num_rows($response);

		// Check if username is already in the database
		if ($num > 0){
			exit("Username is already in the database");
			// redirect back to the login page with a status code 422
			//header('Location: ' . $_SERVER['HTTP_REFERER'], 422);
		}

		// Add user into DB
		$add_user = "INSERT INTO " . DB_TABLE_NAME . " VALUES (NULL, '" . $username . "', '" . $password . "')";
		// result is an object
		if (mysqli_query($conn, $add_user)) {
	    		echo "New record created successfully";
			header("location: index.html"); 
		} else {
	    		echo "Error: " . $add_user . "<br>" . mysqli_error($db);
		}
	}
?> 
