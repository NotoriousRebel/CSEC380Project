<?php
	include('common.php');
	session_start();
	
	$check = $_SESSION['loggedin_user'];
	
	$query = mysqli_query($conn, "SELECT UserName FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $check . "'");
	
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	$loggedin_session = $row['UserName'];
	
	if(!isset($_SESSION['loggedin_user'])){
		header("location index.html");
		die();
	}
?>