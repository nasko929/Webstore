<?php
	session_start();
	$con=mysqli_connect('127.0.0.1','nasko','yJ9i8PpGRync0ud5','webstore');
	if(!$con)
		echo "Excuse us. We're currently inavailable to connect to our database. Please be patient!";
	require("paths/paths.php");
	require($help_functions_path);
?>