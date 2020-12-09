<?php
 $thisStyle = 0;

 if (isset($_COOKIE["selectedStyle"])) { // has the cookie already been set
   $thisStyle = $_COOKIE["selectedStyle"];
 }

 if (isset($_POST["changeStyle"])) { // changing the style
   $thisStyle = $_POST["changeStyle"];
 }

 setcookie("selectedStyle", $thisStyle); // update or create the cookie
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width">
<title>Retro Games Catalogue</title>
   <link rel="stylesheet" href="css/style<?= $thisStyle; ?>.css">
   </head>
	<body>
	<div class="page-wrapper">
	<header class="top-header">
		<div class="top-banner">
			<div id="logo">
				<img src="media/gameboy.png" alt="" height="155" width="198">				
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
     <h1>Style Selector</h1>
     <form method="post" action="<?= $_SERVER["PHP_SELF"];?>">
       <label>Style 0</label><input type="submit" name="changeStyle" value="0"><BR>
       <label>Style 1</label><input type="submit" name="changeStyle" value="1"><BR>
     </form>
     <p><a href="index.php">Back to homepage</a></p>
	 
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="register.php">Register</a></p>
			<p><a href="changestyle.php">Change Style</a></p>
			<p><a href = "logout.php">Logout</p>
		</footer>
   </body>
 </html>