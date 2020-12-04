<?php 
	session_start();
	
	if(!isset($_SESSION['user_id'])) {
		include("login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>RGC - Catalogue</title>
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
					<li><a href="catalogue.php">Catalogue</a></li>					
					<li><a href="login.php">Login</a></li>							
					<li><a href="basket.php">Basket</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<div class="search-bar">
				<form action="searchform.php" method="post">
					<p>Search for a game:
						<input id="bar1" type="text" name="searchName"</p>
						<select name="genre" id="genre">
							<option value="">All</option>
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Fighting">Fighting</option>
							<option value="Platform">Platform</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Role-Playing">RPG</option>
							<option value="Sports">Sports</option>
						<input id="button" type="submit" value="Search"</p>
				</form>	
			</div>		
		</header>
		<main class="main">
			<!-- First Section -->
			<section class="catalogue clearfix">
				<div class="container-featured">
				<?php 
				//Connect to DB server
				$mysqli = mysqli_connect("localhost", "1905485", "AshOnMYLINUX", "db1905485");
	
				if (mysqli_connect_errno($mysqli))  
					echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
				//Build query
				$sql = "SELECT * FROM retrogames";
	
				//Run SQL query
				$result = mysqli_query($mysqli, $sql);
	
				//How many rows got returned?
				$num_games = mysqli_num_rows($result);
	
				print("<p>Here is our full game catalogue.</p>");
		
				//Loops to print games.
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo $row['name']. " - ". $row['genre']. " - ". $row['year']. " - ". $row['console'] ."<br>";
					echo $row['description']."<br>";
					echo "<br>";
				}
				?>
				</div>
			</section>
		</main>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="changestyle.php">Change Style</a></p>
		</footer>
	</div>
	</body>
	</html>
<?php session_destroy(); ?>
