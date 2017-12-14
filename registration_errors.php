<?php
	require($user_data_config_path);
	$arr_errors = [];
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