<?php
	$title = "Adding new product";
	require("header_footer/header.php");
?>

<div class="centering">
	<h1>Adding new product</h1>
	<form method = "post" action = "add_product.php">
		<input placeholder="Name" type = "text" name = "name"><br><br>
		<input placeholder="Description" type = "textarea" name = "description"><br><br>
		<input type="hidden" name = "welldone" value = "1">
		<input placeholder="Price" type = "text" name = "price"><br><br>
		<input placeholder="Quantity" type = "text" name = "quantity"><br><br>
		<input placeholder="PictureURL" type = "text" name = "pictureurl"><br>
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
		<input type = "submit" value = "Add">
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
		$query = "INSERT INTO products ( name, description, price, quantity, picture_url) VALUES ('".$name."', '".$description."', '".$price."', '".$quantity."', '".$pictureurl."') ";
		$curr_index = mysqli_insert_id($con);
		$categories = $_POST['categories'];
		$ids = [];
		foreach($categories as $category)
		{
			$curr = explode('x',$category);
			$ids[] = $curr[0];
		}
		if(mysqli_query($con,$query) == TRUE)
		{
			$id_prod = mysqli_insert_id($con);
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