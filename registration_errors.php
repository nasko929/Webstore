<?php
	require($user_data_config_path);
	$arr_errors = [];
	if($_FILES['profilepic']['error']!=0 && $_FILES['profilepic']['error']!=4)
	{
		$arr_errors[] = "Error while uploading profile picture.";
	}
	$format_of_picture = explode('.',$_FILES['profilepic']['name']);
	$format_of_picture = $format_of_picture[count($format_of_picture)-1];
	if($format_of_picture != 'gif' && $format_of_picture != 'png' && $format_of_picture != 'jpg' && $format_of_picture != 'jpeg')
	{
		$arr_errors[] = "The picture is not in supported format ( GIF, PNG, JPG, JPEG).";
	}
	if($password != $conf_password)
	{
		$arr_errors[] = "Passwords don't match.";
	}
	if(strlen($username) < $min_username_len)
	{
		$arr_errors[] = "Username length must be at least ".$min_username_len." characters.";
	}
	if($password_len < $min_password_len)
	{
		$arr_errors[] = "Password length must be at least ".$min_password_len." characters.";
	}
	if(strlen($fname) < $min_fname_len)
	{
		$arr_errors[] = "First name's length must be at least ".$min_fname_len." characters.";
	}
	if(strlen($lname) < $min_lname_len)
	{
		$arr_errors[] = "Last name's length must be at least ".$min_lname_len." characters.";
	}
?>