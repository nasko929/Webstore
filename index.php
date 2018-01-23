<?php
	$title = "Liverpool FC - WebStore. Lowest prices!!!";
	require("header_footer/header.php");
?>
<a href="ajax.php">Go and try AJAX</a>
<div style = "text-align: right">
	<?php
		$my_profile_redirect = redirect_to_based_on_is_logged($my_profile_path,$login_path);
		echo '<a href="'.$my_profile_redirect.'">My Profile</a>';
		if(isset($_SESSION['is_logged']))
		{
			if(isset($_SESSION['username']))
				echo '<br>Hello, '.$_SESSION['username'].'!';
			require($check_admin_path);
			if($curr_user_admin == 1)
				echo '<br><a href="'.$admin_panel_path.'">Enter Admin Panel</a>';
			echo '<br><a href="'.$logout_path.'">Logout</a>';
		}
		else
		{
			echo '<br><a href="'.$login_path.'">Login</a><br>';
			echo '<a href="'.$register_path.'">Would you like to register?</a>';
		}
	?>
</div>
<div class="centering">
	<font face="georgia">
		<h1>Welcome to Official Liverpool FC Store!</h1>
		<h3>Select category/categories for the product you're looking for:</h6>
	</font>
	<?php
		$query_list = "SELECT * FROM categories WHERE `categories`.`id` > 1";
		$loc = mysqli_query($con,$query_list);
	?>
	<form method="get" action="index.php">
		<?php
			echo '<select name="categories[]" multiple>';
			while($row = mysqli_fetch_assoc($loc))
			{
				echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
			}
			?>
			</select>
			<br><br>
			<input type = "submit" value = "Search">
	</form>
</div>

<?php
	/*$result = mysqli_query($con,"SELECT * FROM products");
	echo '<center><table border=1><thead><th>Name</th><th>Description</th><th>Price</th></thead>';
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<tr><td><center>'.$row['name'].'</center></td><td><center>'.$row['description'].'</center></td><td><center>'.$row['price'].'$</center></td></tr>';
	}
	echo '</table></center>';*/
?>

<?php
	require($footer_path);
?>