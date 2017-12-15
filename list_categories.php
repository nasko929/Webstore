<?php

	$title = "Categories";
	require("header_footer/header.php");
?>

<div class="centering">
	<h1>List Of Categories</h1>
</div>

<?php
	$query = "SELECT * FROM categories WHERE `categories`.`id` > 1";
	$result = mysqli_query($con,$query);
	echo '<center><table border=1><thead><th>ID</th><th>Category</th></thead>';
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<tr><td><center>'.$row['id'].'</center></td><td><center>'.$row['name'].'</center></td></tr>';
	}
	echo '</table></center><br><br>';

	echo '<center><a href="'.$add_category_path.'">Add Category</a></center><br><br>';

	echo '<center><a href="'.$admin_panel_path.'">Back</a></center>';
?>


<?
	
	require($footer_path);

?>