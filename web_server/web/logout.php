<?php
	if (isset($_POST['logout-submit'])) {
		session_start();
	
		if(session_destroy()){
			header("location: index.html");
		}
	}
?>