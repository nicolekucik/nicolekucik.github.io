<!DOCTYPE html>
<html lang="en">
<head>
	<title>Happy (almost) Birthday!</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<h1>Hi Ali!</h1>
		<?php 
		$date = strtotime("April 28, 2015");
		$remaining = date - time();
		$days_remaining = floor($remaining / 86400);
		echo "It's not your birthday yet! Open me in $remaining seconds";
		echo "I'm literally counting down the seconds, I'm so excited";
		?>
</body>
</html>
