<?php
	include("session.php");

	if (isset($_POST['delete-submit'])) {
		$vidID = $_POST['vidID'];
		$vidPath = "uploads/".$_POST['vidName'];

		$sql = 'DELETE FROM Videos WHERE VideoID LIKE "' . $vidID . '";';
		if(mysqli_query($conn, $sql)){
			if(unlink($vidPath)){
				header("location: landing.php");
			} else {
				echo "Error deleting video";
			}
		}
	}
?>