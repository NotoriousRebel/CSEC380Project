<?php
   define('DB_SERVER', "localhost");
   define('DB_USERNAME', "admin");
   define('DB_PASSWORD', "pass");
   define('DB_DATABASE', "Users");
   define('DB_TABLE_NAME', "Credentials");
   define('DB_TABLE_NAME2', "Videos");

   $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
   }
?>
