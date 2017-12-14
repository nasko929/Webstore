<?php
	$title = "Login";
	require("header_footer/header.php");
?>

<div class="centering">
	<h1>Login</h1>
	<form method="post" action="login.php">
		<input placeholder="Username" type="text" name="username">
		<input type="hidden" name="welldone" value="1"><br><br>
		<input placeholder="Password" type="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>
	<a href=<?php echo $index_path; ?> >Back</a>
</div>

<?php
	if(isset($_POST['welldone']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$result = mysqli_query($con,'SELECT * FROM users WHERE `username`="'.$username.'"');
		if($result->num_rows > 0)
		{
			$row = mysqli_fetch_assoc($result);
			if(password_verify($password,$row['encrypted_password']))
			{
				$_SESSION['username'] = $username;
				$_SESSION['is_logged'] = 1;
				$_SESSION['id'] = $current_user[0]['id'];
				header("Location: ".$index_path);
			}
			else
			{
				echo '<center><h4>Invalid password</h4></center><br>';
			}
		}
		else
		{
			echo '<center><h4>Invalid username.</h4></center><br>';
		}
	}
?>

<?php
	require($footer_path);
?>