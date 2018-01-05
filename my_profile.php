<?php
	$title = "My profile";
	require("header_footer/header.php");
	require($constants_path);
?>
<div class="centering">
	<h1>Profile of <?php echo $_SESSION['username']; ?></h1>
</div>
<?php
	require($footer_path);
?>