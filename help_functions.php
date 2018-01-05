<?php
	function redirect_to_based_on_is_logged($path_when_logged,$path_when_not_logged)
	{
		$result = "";
		if(isset($_SESSION['is_logged']))
			$result = $path_when_logged;
		else
			$result = $path_when_not_logged;
		return $result;
	}
?>