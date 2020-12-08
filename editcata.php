<?php 
	if(!isset($_SESSION))
	{	
		session_start();
	}
	
	if ($_SESSION["loggedIn"] == true)     // a user has logged in

	if (!isset($_SESSION["loggedIn"]))  // a user has not logged in - the SESSION variable has not been set

	$_SESSION["loggedIn"] = true;     // set when a user is authenticated
		
	if(!isset($_SESSION['user_id'])) {
		include("login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, intial-scale=1">
<title>RGC - Edit Catalogue</title>
	<?php
		
	if (isset($_COOKIE["selectedStyle"])) { // if style has been set
		$style = $_COOKIE["selectedStyle"];
	} else { // if style not yet set, default to 0
		$style = 0;
	}
	?>
	
    <!-- Remember to change the css to work with the selection <link rel="stylesheet" href="css/style<?= $style; ?>.css"> -->
	<link href="css/style0.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="page-wrapper">
	<header class="top-header">
		<div class="top-banner">
			<div id="logo">
				<img src="media/gameboy.png" alt="" height="150">				
				<h1>Retro Games Catalogue</h1>
			</div> </div>
				
			<!-- Navigation Bar -->
			<nav class="nav-bar">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="catalogue.php">Catalogue</a></li>					
					<li><a href="login.php">Login</a></li>							
					<li><a href="editcat.php">Edit Catalogue</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<div class="addcatalogue">
				<h2>Add to Catalogue</h2>
				
			</div>
		</main>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="register.php">Register</a></p>
			<p><a href="changestyle.php">Change Style</a></p>
		</footer>
	</div>
	</body>
	</html>
<?php session_destroy(); ?>
