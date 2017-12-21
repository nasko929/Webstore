<?php

	$title = "Changing category";
	require("header_footer/header.php");
	$changed_category_id = $_GET['chg_id'];
	$get_info = "SELECT * FROM categories WHERE `categories`.`id` = ".$changed_category_id;
	$info = mysqli_query($con,$get_info);
	$info = mysqli_fetch_assoc($info);
?>

<div class = "centering">
	<h1>Change category</h1>
	<form method = "post" action = <?php echo "change_category.php?chg_id=".$changed_category_id; ?> >
		<input type = "text" placeholder = "Category Name" name = "cname" value = <?php echo $info['name']; ?> >
		<input type = "hidden" name = "changed" value = "1">
		<input type = "submit" value="Change">
	</form>
</div>
<?php
	
	if(isset($_POST['changed']))
	{
		$cat_name = $_POST['cname'];
		$query = "UPDATE categories SET name = '".$cat_name."' WHERE id = ".$changed_category_id;
		if(mysqli_query($con,$query))
		{
			header("Location: ".$list_categories_path);
		}
		else
		{
			echo "Error: ". mysqli_error($con);
		}
	}

?>

<?php

	require($footer_path);

?>