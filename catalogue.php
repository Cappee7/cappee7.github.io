<?php 
	if(!isset($_SESSION))
	{	
	session_start();
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
					<li><a href="editcata.php">Add To Catalogue</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<div class="search-bar">
				<form action="searchform.php" method="POST">
						<input id="bar1" type="text" name="searchName" placeHolder="Search for a game..." onclick="DoSearch();"/>
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
						<input id="button" type="submit" name ="search" value="Search" />
						<p id="results"></p>
				</form>	
			</div>		
			<!-- First Section -->
			<section class="catalogue clearfix">
				<div class="catalogue-featured">
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
	
				print("<h2>Here is our full game catalogue.</h2>");
		
				//Loops to print games.
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo "<h2>". $row['name']. " - ". $row['genre']. " - ". $row['year']. " - ". $row['console'] ."<br></h2>";
					echo "<h4>". $row['description']."<br></h4>";
					echo "<br>";
				}
				?>
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
