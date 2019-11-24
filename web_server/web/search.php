<?php
include('common.php');
$search_q = $_POST['search'];
echo $search_q;
$query = mysqli_query($conn, "SELECT * FROM " . DB_TABLE_NAME2 . " WHERE OrigName = '" . $search_q . "'");

$resultcheck = mysqli_num_rows($query);

if ($resultcheck > 0){
	while($row = mysqli_fetch_assoc($query)) {
		$sql = "SELECT * FROM " . DB_TABLE_NAME2 . " WHERE OrigName = '" . $search_q . "'";
		$result = mysqli_query($conn, $sql);
		$row2 = mysqli_fetch_assoc($result);

		$location = "uploads/".$row['VideoName'];

		echo "<div>";
		echo "<video src='".$location."' controls width='320px' height='200px' ></video>";
		$usernamestr = "Posted by " . $row2['UserName'];
		echo htmlspecialchars($usernamestr);

		if ($row2['UserName'] == $loggedin_session){
			echo "<form action='delete.php' method='POST'>";
			echo "<input type=hidden name=vidID value='".$row['VideoID']."'/>";
			echo "<input type=hidden name=vidName value='".$row['VideoName']."'/>";
			echo "<button name=delete-submit>Delete</button>";
			echo "</form>";
		}
		echo "</div>";
	}
}

?>