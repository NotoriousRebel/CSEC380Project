<?php
	include("session.php");

	if (isset($_POST['upload-submit']) || isset($_POST['upload-submitlink'])) {

		if(isset($_POST['upload-submitlink'])) {

			if(empty($_POST['videolink'])){
				header("Location: landing.php");
			} else {
				$url = $_POST['videolink'];
				$fileName = basename($url);
				$fileExt = explode('.', $fileName);
				$fileRealExt = strtolower(end($fileExt));
				$fileError = 0;
				$fileTmpName = file_get_contents($url);
				$fileSize = filesize($fileTmpName);
			}
		} else if(isset($_POST['upload-submit'])) {
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileExt = explode('.', $fileName);
			$fileRealExt = strtolower(end($fileExt));
		}

		$allowed = array('mov', 'mp4', 'wmv', 'avi', 'flv');

		if (in_array($fileRealExt, $allowed)) {
			if($fileError === 0){
				if ($fileSize < 1000000000 ){
					$fileNameNew = uniqid('', true).".".$fileRealExt;
					$fileDestination = "uploads/".$fileNameNew;
					if(isset($_POST['upload-submit'])) {
						if(move_uploaded_file($fileTmpName, $fileDestination)){
							$query_username = "SELECT ID FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $loggedin_session . "';";
							$result = mysqli_query($conn, $query_username);
							$row = mysqli_fetch_assoc($result);

							$add_video = "INSERT INTO " . DB_TABLE_NAME2 . " VALUES(NULL, '" . $row['ID'] . "', '" . $fileNameNew . "');";
						
							if(mysqli_query($conn, $add_video)){
								header("Location: landing.php");
							} else{
								echo "Error inserting file";
							}
						} else{
							echo "Error moving file";
						}
					} else {
						if(file_put_contents($fileDestination, $fileTmpName)){
							$query_username = "SELECT ID FROM " . DB_TABLE_NAME . " WHERE UserName = '" . $loggedin_session . "';";
							$result = mysqli_query($conn, $query_username);
							$row = mysqli_fetch_assoc($result);

							$add_video = "INSERT INTO " . DB_TABLE_NAME2 . " VALUES(NULL, '" . $row['ID'] . "', '" . $fileNameNew . "');";
						
							if(mysqli_query($conn, $add_video)){
								header("Location: landing.php");
							} else{
								echo "Error inserting file";
							}
						} else {
							echo "Error moving file";
						}
					}
				} else {
					echo "Your file is too big!";
				}
			} else{
				echo "There was an error uploading your file!";
			}
		} else {
			echo "You cannot upload files of this type!";
		}
	}
?>