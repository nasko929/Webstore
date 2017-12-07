<html>
	<head>
		<link rel="stylesheet" href="default.css">
		<meta charset="utf-8">
		<title>Liverpool FC - WebStore</title>
	</head>
	<body>
		<div class="centering">
			<h1>Welcome to Official Liverpool FC Store!</h1>
			<form method="post" action="index.php">
				<input placeholder="Search" name="search">
				<input type="submit" value="Search">
			</form>
		</div>
		<?php
			if(strlen($_POST['search']) != 2)
			{
				echo '<br>'.$_POST['search'];
			}
		?>
	</body>
</html>