<?php
	include("common.php");
	include("session.php")

	if (isset($_POST['upload-submit'])) {
		$file = $_FILES['file'];

		$fileName = $_FILES['name'];
		$fileTmpName = $_FILES['tmp_name'];
		$fileType = $_FILES['type'];
		$fileSize = $_FILES['size'];
		$fileError = $_FILES['error'];

		$fileExt = explode('.', $fileName);
		$fileRealExt = strtolower(end($fileExt));

		$allowed = array('mov', 'mp4', 'wmv', 'avi', 'flv');

		if (in_array($fileRealExt, $allowed)) {
			if($fileError === 0){
				if ($fileSize < 1000000000 ){
					$fileNameNew = uniqid('', true).".".$fileRealExt;
					$fileDestination = 'uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					//session.php username
					$sql = "SELECT ID FROM Credentials WHERE UserName LIKE " . $loggedin_session . ";";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result)

					$sql = "INSERT INTO Videos (UserID, VideoName) VALUES (" . $row['ID'] . ", " . $fileNameNew . ");";

					header("Location: landing.php");
				} else {
					echo "Your file is too big!"
				}
			} else{
				echo "There was an error uploading your file!";
			}
		} else {
			echo "You cannot upload files of this type!";
		}

	}
?>