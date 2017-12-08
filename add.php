<?php
	$title =  "Adding new product";
	require("header.php");
?>

<form method="post" action="index.php">
	<label>Name:</label><input type="text" name="name"><br>
	<label>Description: </label><input type="textarea" name="description"><br>
	<input type="hidden" name="welldone" value="1">
	<label>Price: </label><input type="text" name="price"><br>
	<label>Quantity: </label><input type="text" name="quantity"><br>
	<label>PictureURL: </label><input type="text" name="pictureurl"><br>
	<input type="submit" value="Add">
</form>

<?php
	require("footer.php");
?>