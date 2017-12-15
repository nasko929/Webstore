<?php
	$query = 'SELECT * FROM users WHERE `users`.`is_admin`=1 AND `users`.`username`="'.$_SESSION['username'].'"';
	$result = mysqli_query($con,$query);
	$curr_user_admin = $result->num_rows;
?>