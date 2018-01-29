<?php
	$title = "My profile";
	require("header_footer/header.php");
	require($constants_path);
	if(!isset($_SESSION['id']))
	{
		header("Location: ".$login_path);
	}
	$get_profile_pic = "SELECT * FROM users WHERE `users`.`id`=".$_SESSION['id'];
	$result = mysqli_query($con,$get_profile_pic);
	$result = mysqli_fetch_assoc($result);
	$have_prof_pic = ($result['profilepic_url'] == NULL);
?>
<div class="centering">
	<h1>Profile of <?php echo $_SESSION['username']; ?></h1>
	<img src = <?php echo "profile_pics/".$result['profilepic_url']; ?> style = "height: 200px; width: auto;">
	<form action="my_profile.php" method="post" enctype="multipart/form-data">
		Profile Picture:<input type="file" name="newprofilepic"><br><br>
		<input type="hidden" name="sent_new_pic" value="1">
		<input type="submit" value=<?php if($have_prof_pic) echo 'Add'; else echo 'Change';?> >
	</form>
	<h1><a href = <?php echo $delete_profile_path; ?> >Delete your profile</a></h1>
	<h3><a href = <?php echo $index_path; ?> >Back</a></h3>
</div>

<?php
	if(isset($_POST['sent_new_pic']))
	{
		$format_of_picture = explode('.',$_FILES['newprofilepic']['name']);
		$format_of_picture = $format_of_picture[count($format_of_picture)-1];
		if($have_prof_pic)
		{
			if(move_uploaded_file($_FILES['newprofilepic']['tmp_name'], 'profile_pics/profilepic_'.$_SESSION['id'].'.'.$format_of_picture))
			{
				$changing_name_of_profilepic = "UPDATE users SET profilepic_url = 'profilepic_".$_SESSION['id'].'.'.$format_of_picture."' WHERE id = ".$_SESSION['id'];
					mysqli_query($con,$changing_name_of_profilepic);
			}
			else
			{
				echo 'There was an error whilst uploading your new profile picture.<br>';
			}
		}
		else
		{
			;
			unlink('profile_pics/'.$result['profilepic_url']);
			if(!move_uploaded_file($_FILES['newprofilepic']['tmp_name'], 'profile_pics/profilepic_'.$_SESSION['id'].'.'.$format_of_picture))
			{
				echo 'There was an error whilst uploading your new profile picture.<br>';
			}
			else
			{
				$changing_name_of_profilepic = "UPDATE users SET profilepic_url = 'profilepic_".$_SESSION['id'].'.'.$format_of_picture."' WHERE id = ".$_SESSION['id'];
					mysqli_query($con,$changing_name_of_profilepic);
			}
		}
	}
?>

<?php
	require($footer_path);
?>