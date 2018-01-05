<?php
	$title = "Registration";
	require("header_footer/header.php");

?>
<div class="centering">
	<h1>Register</h1>
	<form action="register.php" method="post" enctype="multipart/form-data">
		<input placeholder="Username" type="text" name="username"><br><br>
		<input placeholder="Password" type="password" name="pass"><br><br>
		<input placeholder="Confirm Password" type="password"  name="pass_conf"><br><br>
		<input placeholder="E-mail" type="text" name="email"><br><br>
		<input placeholder="First Name" type="text" name="fname">
		<input type="hidden" name="sent_registration_form" value="1">
		<input placeholder="Last Name" type="text" name="lname"><br><br>
		Profile Picture:<input type="file" name="profilepic"><br><br>
		<input type="submit" value="Register">
	</form>
	<a href=<?php echo $login_path; ?> >You already have profile?</a><br><br>
	<a href=<?php echo $index_path; ?> >Back</a>
</div>

<?php
	if(isset($_POST['sent_registration_form']))
	{
		$password = trim($_POST['pass']);
		$conf_password = trim($_POST['pass_conf']);
		$password_len = strlen($password);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$profilepic_url = trim($_FILES['profilepic']['name']);
		require($reg_errors_path);
		$password = password_hash($password, PASSWORD_DEFAULT);
		if(count($arr_errors) == 0)
		{
			$query = "INSERT INTO users ( username, encrypted_password, first_name, last_name, email, profilepic_url) VALUES ('".$username."', '".$password."', '".$fname."', '".$lname."', '".$email."', '".$profilepic_url."') ";
			if(mysqli_query($con,$query)==TRUE)
			{
				if(move_uploaded_file($_FILES['profilepic']['tmp_name'], 'profile_pics/profilepic_'.mysqli_insert_id($con).'.'.$format_of_picture))
				{
					$_SESSION['is_logged'] = 1;
					$_SESSION['id'] = mysqli_insert_id($con);
					$_SESSION['username'] = $username;
					echo "Registration is successful.<br>";
					$changing_name_of_profilepic = "UPDATE users SET profilepic_url = 'profilepic_".$_SESSION['id'].'.'.$format_of_picture."' WHERE id = ".$_SESSION['id'];
					mysqli_query($con,$changing_name_of_profilepic);
					header("Location: ".$index_path);
				}
				else
				{
					echo 'There was an error uploading your profile pic!<br>';
				}
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