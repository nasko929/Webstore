<!-- Little problems with requiring the header; therefore i just copied it -->
<?php
	require("header_footer/header_php.php");
	$item_id = $_GET['item_id'];
	$get_info = "SELECT * FROM products WHERE `products`.`id`=".$item_id;
	$info = mysqli_query($con,$get_info);
	$info = mysqli_fetch_assoc($info);
	$title = "Viewing: ".$info['name'];
	require("header_footer/header_html.php");

?>
<div class="centering">
	<h1><?php echo $info['name']; ?></h1>
	<img src=<?php echo "pics/".$info['picture_url']; ?> style = "height: 200px; width: auto;" alt = <?php echo $info['name'].'-picture'; ?> ></img>
	<h3><?php echo $info['description']; ?></h3>
	<h2><?php echo $info['price']; ?>$</h2>
	<?php
		if($info['quantity'] != 0)
		{
			?>
			<h2><p id="blink" style="cursor:hand; text-decoration: underline;">BUY NOW</p></h2>
			<?php
		}
		else
			echo "<h2>Not in stock.</h2>";
	?>
	<h2>Categories:</h2>
	<?php
		$query_for_categories = "SELECT * FROM categories_products WHERE `categories_products`.`product_id`=".$item_id;
		$categories_result = mysqli_query($con,$query_for_categories);
		while($category = mysqli_fetch_assoc($categories_result))
		{
			$category_id = $category['category_id'];
			echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM categories WHERE `categories`.`id`=".$category_id))['name'].'<br>';
		}
	?>
	<br>
	<a href=<?php echo $list_products_path; ?> >Back</a>
</div>


<?php
	require($footer_path);
?>