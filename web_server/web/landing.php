<?php
	include('session.php');
?>

<html>
	<head>
	<meta charset="utf-8">
	<title> Welcome to Memetube </title>
	<link rel="stylesheet" type="text/css" href="landing.css">
    </head>

	<body>
		<h1 align="center"> Welcome to Memetube, <?php echo $loggedin_session; ?></h1>
		<div class = "box">
			<div class="column1"></div>

			<div class="column2" style="text-align:center">
       
			<form action="upload.php" method="POST" enctype="multipart/form-data">
           		<input type="file" name="file" />
           		<button type = "submit" name="upload-submit">UPLOAD</button>
            </form>

            <form action="upload.php" method="POST">
            	Video URL:<input type="url" name="videolink" placeholder="Paste video URL here">
            	<input type="submit" name="upload-submitlink" value="Send data">
            </form>

            <?php
            	$sql = "SELECT * FROM Videos;";
				$results = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($results);

				if ($resultcheck > 0){
					while($row = mysqli_fetch_assoc($results)) {
						$sql = 'SELECT UserName FROM ' . DB_TABLE_NAME . ' WHERE ID LIKE "' . $row['UserID'] . '";';
						$result = mysqli_query($conn, $sql);
						$row2 = mysqli_fetch_assoc($result);

						$location = "uploads/".$row['VideoName'];

						echo "<div>";
						echo "<video src='".$location."' controls width='320px' height='200px' ></video>";
						echo "<p>Posted by " . $row2['UserName'] . "</p>";
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

			</div>
			<div class="column3"></div>		
		</div>
		<form action="logout.php" method="POST">
			<button id="button" type="submit" name="logout-submit"> Log-Out</button>
		</form>
	</body>
</html>