<?php 

	$arr_errors=[];
	if(strlen($username)<6)
	{
		$arr_errors[]="Username length must be at least 6 characters.";
	}
	if($password_len<6)
	{
		$arr_errors[]="Password length must be at least 6 characters.";
	}
	if(strlen($fname)<3)
	{
		$arr_errors[]="First name's length must be at least 3 characters.";
	}
	if(strlen($lname)<3)
	{
		$arr_errors[]="Last name's length must be at least 3 characters.";
	}
?>