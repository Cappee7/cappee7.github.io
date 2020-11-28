<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Retro Games Catalogue</title>
	<?php
	if (isset($_COOKIE["selectedStyle"])) { // if style has been set
		$style = $_COOKIE["selectedStyle"];
	} else { // if style not yet set, default to 0
		$style = 0;
	}
	?>
   
	<link rel="stylesheet" href="css/style<?= $style; ?>.css">
		</head>
		<body>
			<h1>Retro Games Catalogue</h1>
			<form action="searchform.php" method="post">
				<p>Search for a game:
					<input type="text" name="searchName"</p>
				<p>
					<input type="submit" value="Search"</p>
			</form>
			<p><a href="changestyle.php">Change Style</a></p>
		</body>
	</html>
