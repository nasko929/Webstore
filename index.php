<?php
	$title="Liverpool FC - WebStore. Lowest prices!!!";
	require("header_footer/header.php");
?>
<div style="text-align: right">
	<?php
		if(isset($_SESSION['is_logged']))
		{
			if(isset($_SESSION['username']))
				echo 'Hello, '.$_SESSION['username'].'!';
			echo '<br><a href="'.$logout_path.'">Logout</a>';
		}
		else
		{
			echo '<a href="'.$login_path.'">Login</a><br>';
			echo '<a href="'.$register_path.'">Would you like to register?</a>';
		}
	?>
</div>
<div class="centering">
	<font face="georgia">
		<h1>Welcome to Official Liverpool FC Store!</h1>
	</font>
	<form method="get" action="index.php">
		<input placeholder="Search" list="options" name="search">
		<datalist id="options">
			<option value="Clothes">
			<option value="Souvenirs">
			<option value="Accessories">
		</datalist>
		<input type="submit" value="Search">
	</form>
</div>
<div class="centering">
	<?php
		echo '<a href="'.$add_product_path.'">Add</a>';
	?>
</div>
<?php
	if(isset($_POST['welldone']))
	{
		$name=$_POST['name'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		$pictureurl=$_POST['pictureurl'];
		$query = "INSERT INTO products ( name, description, price, quantity, picture_url) VALUES ('".$name."', '".$description."', '".$price."', '".$quantity."', '".$pictureurl."') ";
		if(mysqli_query($con,$query)==TRUE)
		{
			echo "New record created successfully.<br>";
		}
		else
		{
			echo "Error: " .$query." => ". mysqli_error($con);
		}
	}
	$result = mysqli_query($con,"SELECT * FROM products");
	echo 'All products are:<br>';
	echo '<center><table border=1><thead><th>Name</th><th>Description</th><th>Price</th></thead>';
	while($row=mysqli_fetch_assoc($result))
	{
		echo '<tr><td><center>'.$row['name'].'</center></td><td><center>'.$row['description'].'</center></td><td><center>'.$row['price'].'$</center></td></tr>';
	}
	echo '</table></center>';
?>

<?php
	require($footer_path);
?>