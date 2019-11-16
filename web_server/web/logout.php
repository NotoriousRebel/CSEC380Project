<?php
	if (isset($_POST['upload-submit'])) {
		session_start();
	
		if(session_destroy()){
			header("location: index.html");
		}
	}
?>