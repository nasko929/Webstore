<?php
	session_start();
	$con = mysqli_connect('127.0.0.1','nasko','yJ9i8PpGRync0ud5','webstore');
	if(!$con)
		echo "Excuse us. We're currently inavailable to connect to our database. Please be patient!";
	require("paths/paths.php");
	require($help_functions_path);
?>
<html>
	<head>
		<link rel = "stylesheet" href = <?php echo $css_default_path; ?> >
		<meta charset = "utf-8">
		<title><?php echo $title; ?></title>
		<base href=<?php echo '"'.url().'"'; ?> >
	</head>
	<body>