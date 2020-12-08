<?php 
	if(!isset($_SESSION))
	{	
		session_start();
	}
	
	if ($_SESSION["loggedIn"] == true)     // a user has logged in

	if (!isset($_SESSION["loggedIn"]))  // a user has not logged in - the SESSION variable has not been set

	$_SESSION["loggedIn"] = true;     // set when a user is authenticated
?>
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
					<li><a href="editcata.php">Edit Catalogue</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<form method="post" action="<?= $_SERVER["PHP_SELF"]; ?>">
				<?php
					$firstName = ""; $lastName = "";

					if (isset($_POST["updateDetails"])) { // if a request to update the session has been received...
						$_SESSION["firstName"] = $_POST["firstName"];
						$_SESSION["lastName"] = $_POST["lastName"];
						echo "<h1>UPDATED!</h1>";
   					}

   					if (isset($_SESSION["firstName"])) { // if the names are already set in the session...
	   					$firstName = $_SESSION["firstName"];
	   					$lastName = $_SESSION["lastName"];
   					}
 				?>
 				<p>Enter First Name: <input type="text" name="firstName" value="<?= $firstName; ?>"></p>
 				<p>Enter Last Name: <input type="text" name="lastName" value="<?= $lastName; ?>"></p>
 				<p><input type="submit" name="updateDetails" value="Update"></p>
     		</form>		
			<footer class="footer">
				<h4>This is the footer content. Change CSS here.</h4>
				<p><a href="changestyle.php">Change Style</a></p>
			</footer>
		</main>
		</div>
	</body>
	</html>
<?php session_destroy(); ?>
