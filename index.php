<?php 
	if(!isset($_SESSION))
	{	
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width">
<title>Retro Games Catalogue</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
	$(function() {
		$("#bar1").autocomplete({
			source: "getdata.php",
		});
	});
</script>

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
					<li><a href="editcata.php">Add To Catalogue</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<div class="search-bar">
				<form action="searchform.php" method="POST">
						<input id="bar1" type="text" name="searchName" placeHolder="Search for a game..."/>
						<select id="genre" name="searchGenre">
							<option value="">All</option>
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Fighting">Fighting</option>
							<option value="Platform">Platform</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Role-Playing">RPG</option>
							<option value="Sports">Sports</option>
							</select>
						<input id="button" type="submit" name ="search" value="Search" onclick="DoSearch();"/>
						<div class="result" </div>
				</form>	
			</div>		
			<!-- First Section -->
			<section class="featured-games clearfix">
				<h5>Featured NES Games</h5>
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
						<h3>Duck Hunt.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
					<div class="featured">
						<div id="art4" class="featured-img"></div>
						<h3>Tetris.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
				</div>
			</section>
			<section class="featured-games clearfix">
				<h5>Featured Game boy Games</h5>
				<div class="container-featured">
					<div class="featured">
						<div id="gb1" class="featured-img-gb"></div>
						<h2>Pokemon Red.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
					<div class="featured">
						<div id="gb2" class="featured-img-gb"></div>
						<h2>Super Mario Land.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
				</div>
				<div class="container-featured">
					<div class="featured">
						<div id="gb3" class="featured-img-gb"></div>
						<h3>Dr. Mario.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
					<div class="featured">
						<div id="gb4" class="featured-img-gb"></div>
						<h3>Kirby's Dream Land.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer nec odio. Praesent libero.</p>
					</div>
				</div>
			</section>
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
