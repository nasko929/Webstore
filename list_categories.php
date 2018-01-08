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
	echo '<center><table border=1><thead><th>ID</th><th>Category</th><th>Change</th><th>Delete</th></thead>';
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<tr><td><center>'.$row['id'].'</center></td><td><center>'.$row['name'].'</center></td>';
		?>
		<td><a href=<?php echo $change_category_path.'?chg_id='.$row['id']; ?> >Change</a></td>
		<td><a href=<?php echo $delete_category_path.'?del_id='.$row['id'] ?> >Delete</a></td>
		<?php
		echo '</tr>';
	}
	echo '</table></center><br><br>';

	echo '<center><a href="'.$add_category_path.'">Add Category</a></center><br><br>';

	echo '<center><a href="'.$admin_panel_path.'">Back</a></center>';
?>


<?
	
	require($footer_path);

?>