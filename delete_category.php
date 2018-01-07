<?php
	require("header_footer/header.php");
	if(!isset($_GET['confirmation']))
	{
		echo '<center><h1>Do you really want to delete this category?</h1></center>';
		?>
		<center><h3><a href=<?php echo $delete_category_path.'?del_id='.$_GET['del_id'].'&confirmation=1' ?> >Yes</a></h3></center>
		<center><h3><a href=<?php echo $delete_category_path.'?del_id='.$_GET['del_id'].'&confirmation=0' ?> >No</a></h3></center>
		<?php
	}
	else if($_GET['confirmation'])
	{
		$title = "Deleting category";
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
	}
	else
	{
		header("Location: ".$list_categories_path);
	}

?>


<?php
	require($footer_path);
?>