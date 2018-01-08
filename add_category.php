<?php

	$title = "Add new category";
	require("header_footer/header.php");

?>

<div class = "centering">
	<h1>Add new category</h1>
	<form method = "post" action = "add_category.php">
		<input type = "text" placeholder = "Category Name" name = "cname">
		<input type = "hidden" name = "addition" value = "1">
		<input type = "submit" value="Add">
	</form>
</div>
<?php
	
	if(isset($_POST['addition']))
	{
		$cat_name = $_POST['cname'];
		$query = "INSERT INTO `categories` (`name`) VALUES ( '".$cat_name."')";
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