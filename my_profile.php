<?php
	$title = "My profile";
	require("header_footer/header.php");
	require($constants_path);
	$get_profile_pic = "SELECT * FROM users WHERE `users`.`id`=".$_SESSION['id'];
	$result = mysqli_query($con,$get_profile_pic);
	$result = mysqli_fetch_assoc($result);

?>
<div class="centering">
	<h1>Profile of <?php echo $_SESSION['username']; ?></h1>
	<img src = <?php echo "profile_pics/".$result['profilepic_url']; ?> style = "height: 200px; width: auto;">
	<h1><a href = <?php echo $delete_profile_path; ?> >Delete your profile</a></h1>
</div>
<?php
	require($footer_path);
?>