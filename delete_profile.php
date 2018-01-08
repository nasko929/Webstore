<?php
	$title = "Deleting profile";
	require("header_footer/header.php");
	if(!isset($_GET['confirmation']))
	{
		echo '<center><h1>Do you really want to delete your profile?</h1></center>';
		?>
		<center><h3><a href= <?php echo $delete_profile_path.'?confirmation=1'; ?> >Yes</a></h3></center>
		<center><h3><a href= <?php echo $delete_profile_path.'?confirmation=0'; ?> >No</a></h3></center>
		<?php
	}
	else if($_GET['confirmation'])
	{
		$pic_url = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE `users`.`id`=".$_SESSION['id']))['profilepic_url'];
		if($pic_url)
			if(file_exists('profile_pics/'.$pic_url)) 
			{
				unlink('profile_pics/'.$pic_url);
			}
		$query_of_deletion = "DELETE FROM users WHERE `users`.`id`=".$_SESSION['id'];
		if(mysqli_query($con,$query_of_deletion))
		{
			session_destroy();
			header("Location: ".$index_path);
		}
		else
		{
			echo 'There was an error whilst trying to delete your profile. Try again later.<br>';
			echo '<a href="'.$my_profile_path.'">Back</a>';
		}
	}
	else
	{
		header("Location: ".$my_profile_path);
	}

?>


<?php
	require($footer_path);
?>