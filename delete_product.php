<?php
	$title = "Deleting product";
	require("header_footer/header.php");
	$squery = 'DELETE FROM products WHERE `products`.`id`='.$_GET['del_id'];
	$fquery = 'DELETE FROM categories_products WHERE `categories_products`.`product_id`='.$_GET['del_id'];
	if(!mysqli_query($con,$fquery))
	{
		echo 'Error: '.mysqli_error($con);
	}
	if(!mysqli_query($con,$squery))
	{
		echo 'Error: '.mysqli_error($con);
	}

	header("Location: ".$list_products_path);

?>


<?php
	require($footer_path);
?>