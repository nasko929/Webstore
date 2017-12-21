<?php
	$title = "Changing product";
	require("header_footer/header.php");
	$changed_product_id = $_GET['chg_id'];
	$get_info = "SELECT * FROM products WHERE `products`.`id` = ".$changed_product_id;
	$delete_categories = 'DELETE FROM categories_products WHERE `categories_products`.`product_id` ='.$changed_product_id;
	if(!mysqli_query($con,$delete_categories))
	{
		echo "Error => ".mysqli_error($con);
	}
	$info = mysqli_query($con,$get_info);
	#echo '<pre>'.print_r($info,true).'</pre>';
	$info = mysqli_fetch_assoc($info);
	#echo '<pre>'.print_r($info,true).'</pre>';
?>

<div class="centering">
	<h1>Change product</h1>
	<form method = "post" action = <?php echo "change_product.php?chg_id=".$changed_product_id; ?> >
		<input placeholder="Name" type = "text" name = "name" value = <?php echo $info['name']; ?> ><br><br>
		<textarea placeholder="Description"  name = "description"><?php echo $info['description']; ?></textarea><br><br>
		<input type="hidden" name = "welldone" value = "1">
		<input placeholder="Price" type = "text" name = "price" value = <?php echo $info['price']; ?> ><br><br>
		<input placeholder="Quantity" type = "text" name = "quantity" value = <?php echo $info['quantity']; ?> ><br><br>
		<input placeholder="PictureURL" type = "text" name = "pictureurl" value = <?php echo $info['picture_url']; ?> ><br>
		<?php
			$query_list = "SELECT * FROM categories WHERE `categories`.`id` > 1";
			$loc = mysqli_query($con,$query_list);
			echo '<h3>Select all categories for the product</h3>';
			echo '<select name="categories[]" multiple>';
			while($row = mysqli_fetch_assoc($loc))
			{
				echo '<option value="'.$row['id'].'x'.$row['name'].'">'.$row['name'].'</option>';
			}
		?>
		</select>
		<br><br>
		<input type = "submit" value = "Change">
	</form>
</div>

<?php
	if(isset($_POST['welldone']))
	{
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$pictureurl = $_POST['pictureurl'];
		$query = "UPDATE products SET name = '".$name."' , price = '".$price."' , quantity = '".$quantity."',  picture_url = '".$picture_url."', description = '".$description."' WHERE id = ".$changed_product_id;
		echo $query.'<br>';
		$curr_index = $changed_product_id;
		$categories = $_POST['categories'];
		$ids = [];
		foreach($categories as $category)
		{
			$curr = explode('x',$category);
			$ids[] = $curr[0];
		}
		if(mysqli_query($con,$query) == TRUE)
		{
			$id_prod = $curr_index;
			foreach($ids as $id)
			{
				$curr_query = "INSERT INTO categories_products ( product_id, category_id ) VALUES ('".$id_prod."', '".$id."') ";
				if(!mysqli_query($con,$curr_query))
				{
					echo "Error: => ".mysqli_error($con);
				}
			}
			header("Location: ".$list_products_path);
		}
		else
		{
			echo "Error: " .$query." => ". mysqli_error($con);
		}
	}
?>

<?php

	require($footer_path);
	
?>