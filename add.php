<?php
	session_start();
	$title = "Adding new product";
	require("header_footer/header.php");
?>

<form method = "post" action = <?php echo $index_path; ?> >
	<input placeholder="Name" type = "text" name = "name"><br>
	<input placeholder="Description" type = "textarea" name = "description"><br>
	<input type="hidden" name = "welldone" value = "1">
	<input placeholder="Price" type = "text" name = "price"><br>
	<input placeholder="Quantity" type = "text" name = "quantity"><br>
	<input placeholder="PictureURL" type = "text" name = "pictureurl"><br>
	<input type = "submit" value = "Add">
</form>

<?php
	require($footer_path);
?>