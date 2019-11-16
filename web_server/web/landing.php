<?php
	include('session.php');
	include('common.php')
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

			<div class="column2">
       
            <form action="upload.php" method="POST" enctype="multipart/form-data">
           		<input type="file" name="file" />
           		<button type = "submit" name="upload-submit">UPLOAD</button>
            </form>

            //DISPLAY FEED
            //CREATE UPLOAD BUTTON
            //DELETE BUTTON
            //USER WHO UPLOADED

            <?php
            	$sql = "SELECT * FROM Videos;";
				$results = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($results);

				if ($resultcheck > 0){
					while($row = mysqli_fetch_assoc($results)) {
						$sql = "SELECT UserName FROM Credentials WHERE ID LIKE " . $row['UserID'] . ";";
						$result = mysqli_query($conn, $sql);
						$row2 = mysqli_fetch_assoc($result)

						$ib = '<video width="320" height="240" controls><source src="uploads/'. $row['VideoName'] . '" type="video/mp4"></video><p>Posted by ' . $row2['UserName'] . '</p>';

						echo $ib;
            		}
				}
            ?>

			</div>
			<div class="column3"></div>		
		</div>
		<form action="logout.php" method="POST">
			<button id="button" type="submit" name="logout-submit"> Log-Out></button>
		</form>
	</body>
</html>