<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UFT-8">
<title>Retro Games Catalogue</title>
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
				<img src="media/gameboy.png" alt="" height="155" width="198">				
				<h1>Retro Games Catalogue</h1>
			</div> </div>
				
			<!-- Navigation Bar -->
			<nav class="nav-bar">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="catalogue.php">Our Catalogue</a></li>					
					<li><a href="login.php">User Login</a></li>							
					<li><a href="basket.php">Basket</a></li>					
				</ul>
			</nav>
			<div class="search-bar">
			 	<form action="searchform.php" method="post">
				<p>Search for a game:
					<input type="text" name="searchName"</p>
					<input type="submit" value="Search"</p>
				</form>	
			</div>		
		</header>
		<main class="main">
			<!-- First Section -->
			<section class="featured-games clearfix">
				<div class="container-featured">
					<div class="featured">
						<div id="art1" class="featured-img"></div>
						<h2>The Legend of Zelda.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
					<div class="featured">
						<div id="art2" class="featured-img"></div>
						<h2>Super Mario Bros.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
				</div>
				<div class="container-featured">
					<div class="featured">
						<div id="art3" class="featured-img"></div>
						<h2>Duck Hunt.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
					<div class="featured">
						<div id="art4" class="featured-img"></div>
						<h2>Tetris.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
				</div>

			</section>
		</main>
		<footer class="footer">
			<h3>This is the footer content. Change CSS here.</h3>
			<p><a href="changestyle.php">Change Style</a></p>
		</footer>
	</div>
	</body>
	</html>
