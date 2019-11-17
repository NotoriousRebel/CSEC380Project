 <?php
	/*
	Date: 10/10/2019
	Description: This is an intentionally vulnerable script to handle basic authentication
		     of a user on MemeTube. 
	Blind SQL Injection: "a' OR 1=1 -- "
	*/

	// Constant variables
	define('DB_HOST', 'localhost', FALSE);
	define('DB_USER','admin', FALSE);
	define('DB_PASSWORD','pass', FALSE);
	define('DB_NAME', 'Users', FALSE);
	define('DB_TABLE_NAME', 'Credentials', FALSE);

	// POST params
	$username = $_POST['user'];
	$password = $_POST['pass'];
	

	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	  }

	// The query to look for the users creds
	$query = "SELECT * FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $username . "'";
	// result is an object
	$result = mysqli_query($db,$query);
	// get the number of rows returned
	$num = mysqli_num_rows($result);
	
	while ($row = $result->fetch_assoc()){
		echo $row['Password'];
		if (password_verify($password, $row['Password'])){
			echo "Welcome to MemeTube $_POST[user]!";
			break;
		}
		else{
			echo "Credentials not found\n";
			echo "Redirecting";
			//sleep(2);
			// redirect back to the login page with a status code 420
			//header('Location: ' . $_SERVER['HTTP_REFERER'], 420);
			exit();
		}
	}

	mysqli_close($db);
?> 
