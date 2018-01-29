<?php
	require("header_footer/header_php.php");
	$result = mysqli_query($con,"SELECT name FROM categories");
	$names=[];
	while($row = mysqli_fetch_assoc($result))
	{
		$names[$row['name']]=$row['name'];
	}
	echo json_encode($names);

?>