<?php
	require("paths/paths.php");
	session_start();
	session_destroy();
	header("Location: ".$index_path);
?>