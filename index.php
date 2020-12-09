<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">	
<head>
<meta name="viewport" content="width=device-width">
<title>Retro Games Catalogue</title>
	<?php
		
	if (isset($_COOKIE["selectedStyle"])) { // if style has been set
		$style = $_COOKIE["selectedStyle"];
	} else { // if style not yet set, default to 0
		$style = 0;
	}
	?>
	
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("ajaxsearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>	
	<body>
	<link rel="stylesheet" href="css/style<?= $style; ?>.css">
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
			<div class="search-bar">
				<form action="searchform.php" method="POST">
						<input id="bar1" type="text" name="searchName" placeHolder="Search for a game..." autocomplete="off"/>
						<select id="genre" name="searchGenre">
							<option value="">Genre</option>
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Fighting">Fighting</option>
							<option value="Platform">Platform</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Role-Playing">RPG</option>
							<option value="Sports">Sports</option>
							</select>
							
							<select id="year" name="searchYear">
							<option value="">Year</option>
							<option value="1984">1984</option>
							<option value="1985">1985</option>
							<option value="1986">1986</option>
							<option value="1987">1987</option>
							<option value="1988">1988</option>
							<option value="1989">1989</option>
							<option value="1990">1990</option>
							<option value="1991">1991</option>
							<option value="1992">1992</option>
							<option value="1993">1993</option>
							<option value="1994">1994</option>
							<option value="1995">1995</option>
							<option value="1996">1996</option>
							<option value="1997">1997</option>
							<option value="1998">1998</option>
							<option value="1999">1999</option>
							</select>
						<input id="button" type="submit" name ="search" value="Search"/>
				</form>
				<div class="result"></div>	
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
			<p><a href="changestyle.php">Change Style</a> <a href="register.php">Register</a> <a href = "deleteaccount.php">Delete Account</a> <a href = "logout.php">Logout</a></p>
		</footer>
	</div>
	</body>
	</html>
