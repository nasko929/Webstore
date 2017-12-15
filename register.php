<?php
	$title = "Registration";
	require("header_footer/header.php");

?>
<div class="centering">
	<h1>Register</h1>
	<form action="register.php" method="post">
		<input placeholder="Username" type="text" name="username"><br><br>
		<input placeholder="Password" type="password" name="pass"><br><br>
		<input placeholder="Confirm Password" type="password"  name="pass_conf"><br><br>
		<input placeholder="E-mail" type="text" name="email"><br><br>
		<input placeholder="First Name" type="text" name="fname">
		<input type="hidden" name="sent_registration_form" value="1">
		<input placeholder="Last Name" type="text" name="lname"><br><br>
		<input type="submit" value="Register">
	</form>
	<a href=<?php echo $index_path; ?> >Back</a>
</div>

<?php
	if(isset($_POST['sent_registration_form']))
	{
		$password=trim($_POST['pass']);
		$conf_password=trim($_POST['pass_conf']);
		$password_len=strlen($password);
		$password=password_hash($password, PASSWORD_DEFAULT);
		$username=trim($_POST['username']);
		$email=trim($_POST['email']);
		$fname=trim($_POST['fname']);
		$lname=trim($_POST['lname']);
		require($reg_errors_path);
		if(count($arr_errors) == 0)
		{
			$query = "INSERT INTO users ( username, encrypted_password, first_name, last_name, email) VALUES ('".$username."', '".$password."', '".$fname."', '".$lname."', '".$email."') ";
			if(mysqli_query($con,$query)==TRUE)
			{
				$_SESSION['is_logged']=1;
				$_SESSION['id']=mysqli_insert_id($con);
				$_SESSION['username']=$username;
				echo "Registration is successful.<br>";
				header("Location: ".$index_path);
			}
			else
			{
				echo "Error: ".$query." => ". mysqli_error($con);
			}
		}
		else
		{
			echo 'These errors prohibited the registration from happening:<br>';
			echo '<ul>';
			foreach($arr_errors as $v)
			{
				echo '<li>'.$v;
			}
			echo '</ul>';
		}
	}
	require($footer_path);
?>