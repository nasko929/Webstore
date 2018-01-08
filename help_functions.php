<?php
	function redirect_to_based_on_is_logged($path_when_logged,$path_when_not_logged)
	{
		$result = "";
		if(isset($_SESSION['is_logged']))
		{
			$result = $path_when_logged;
		}
		else
		{
			$result = $path_when_not_logged;
		}
		return $result;
	}
	function url()
	{
	    if(isset($_SERVER['HTTPS']))
	    {
	        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	    }
	    else
	    {
	        $protocol = 'http';
	    }
	    return $protocol . "://" . $_SERVER['HTTP_HOST'] .'/webstore/';// $_SERVER['REQUEST_URI'];
	}
?>