<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, intial-scale=1">
<meta charset="UFT-8">
<title>RGC - Register</title>
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
					<li><a href="basket.php">Basket</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<form method="post" action="<?=$_SERVER["PHP_SELF"]; ?>">
			<?php
				$firstName = ""; $lastName = "";
				
				if(isset($_POST["updateDetails"])) {
					$_SESSION["firstName"] = $_POST["firstName"];
					$_SESSION["lastName"] = $_POST["lastName"];
					echo "<h1>UPDATED!</h1>";      
				}
				
				if(isset($_SESSION["firstName"])) {
					$_SESSION["firstName"] = $_POST["firstName"];
					$_SESSION["lastName"] = $_POST["lastName"];
				}
			?>
				
				
			<footer class="footer">
				<h4>This is the footer content. Change CSS here.</h4>
				<p><a href="changestyle.php">Change Style</a></p>
			</footer>
		</main>
		</div>
	</body>
	</html>
<?php session_destroy(); ?>
