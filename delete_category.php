<?php
	$title = "Deleting category";
	require("header_footer/header.php");
	$squery = 'DELETE FROM categories WHERE `categories`.`id`='.$_GET['del_id'];
	$fquery = 'DELETE FROM categories_products WHERE `categories_products`.`category_id`='.$_GET['del_id'];
	if(!mysqli_query($con,$fquery))
	{
		echo 'Error: '.mysqli_error($con);
	}
	if(!mysqli_query($con,$squery))
	{
		echo 'Error: '.mysqli_error($con);
	}

	header("Location: ".$list_categories_path);

?>


<?php
	require($footer_path);
?>