<?php
	
	$title = "Admin Panel";
	require("header_footer/header.php");

?>

<div class="centering">

	<h1>Admin Panel</h1>
	<a href = <?php echo $list_categories_path; ?> >List of Categories</a><br><br>
	<a href = <?php echo $list_products_path; ?> >List of Products</a><br><br>
	<a href = <?php echo $index_path; ?> >Back</a>

</div>
<?php
	
	require($footer_path);

?>