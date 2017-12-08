<?php
	session_start();
	$con=mysqli_connect('127.0.0.1','nasko','yJ9i8PpGRync0ud5','webstore');
	if(!$con)
		echo 'Fuck you, man!<br>';
	$title="Liverpool FC - WebStore. Lowest prices!!!";
	require("header.php");
?>

<?php
	if(isset($_SESSION['is_logged']))
	{
		echo 'Hello, Person!';
	}
	else
	{
		echo 'Would you like to register?';
	}
?>
<div class="centering">
	<h1>Welcome to Official Liverpool FC Store!</h1>
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
	<a href="add.php">Add</a>
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
	require("footer.php");
?>