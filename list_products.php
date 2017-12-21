<?php

	$title = "Products";
	require("header_footer/header.php");
?>

<div class="centering">
	<h1>List Of Products</h1>
</div>

<?php
	$query = "SELECT * FROM products WHERE `products`.`id` > 1";
	$result = mysqli_query($con,$query);
	echo '<center><table border=1><thead><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Change</th><th>Delete</th></thead>';
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<tr><td><center>'.$row['id'].'</center></td><td><center>'.$row['name'].'</center></td><td><center>'.$row['description'].'</center></td><td><center>'.$row['price'].'</center></td>';
		?>

		<td><a href=<?php echo $change_product_path.'?chg_id='.$row['id']; ?> >Change</a></td>
		<td><a href=<?php echo $delete_product_path.'?del_id='.$row['id'] ?> >Delete</a></td>
		<?php
		echo '</tr>';
	}
	echo '</table></center><br><br>';
	echo '<center><a href="'.$add_product_path.'">Add Product</a></center><br><br>';
	echo '<center><a href="'.$admin_panel_path.'">Back</a></center>';
?>


<?
	
	require($footer_path);

?>