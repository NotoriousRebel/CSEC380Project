 <?php
	/*
	Date: 10/10/2019
	Description: This is an intentionally vulnerable script to handle creatting new
				 accounts for meme tube.
	Blind SQL Injection: "a' OR 1=1 -- "
	*/

	// Constant variables
	define('DB_HOST', 'localhost', FALSE);
	define('DB_USER','user', FALSE);
	define('DB_PASSWORD','password', FALSE);
	define('DB_NAME', 'UserInfo', FALSE);
	define('DB_TABLE_NAME', 'UserName', FALSE);

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

	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	// Check connection
	if (mysqli_connect_errno()){
	  exit("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	$query_username = "SELECT * FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $username . "'";
	$response = mysqli_query($db, $query_username);
	$num = mysqli_num_rows($response);

	// Check if username is already in the database
	if ($num > 0){
		exit("Username is already in the database");
		// redirect back to the login page with a status code 422
		//header('Location: ' . $_SERVER['HTTP_REFERER'], 422);
	}

	// The query to look for the users creds
	$add_user = "INSERT INTO " . DB_TABLE_NAME . " VALUES (NULL, '" . $username . "', '" . $password . "')";
	// result is an object
	if (mysqli_query($db, $add_user)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $add_user . "<br>" . mysqli_error($db);
	}

	mysqli_close($db);
?> 
