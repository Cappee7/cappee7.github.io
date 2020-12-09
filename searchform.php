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
						<div class="search-bar">
				<form action="" method="POST">
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
							
							<select id="genre" name="searchYear">
							<option value="">All</option>
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
						<input id="button" type="submit" name ="search" value="Search" onclick="DoSearch();"/>
						<div class="result" </div>
				</form>	
			</div>	
		</header>
		<main class="main clearfix">
			<?php 
	//Connect to DB server
	include("config.php");
	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	//Build query
	$sql = "SELECT * FROM retrogames";
	
	$termName = $_POST['searchName'];
	$termGenre = $_POST['searchGenre'];
	$termYear = $_POST['searchYear'];
	
	// Add search criteria, if provided
	if($termName != "" && $termGenre == "" && $termYear == "")
	{
		$sql.= " WHERE name LIKE '%{$termName}%'";
	}
	else if($termName == "" && $termGenre != "" && $termYear == "") 
	{
		$sql.= " WHERE genre LIKE '%{$termGenre}%'";
	}
	else if($termName == "" && $termGenre == "" && $termYear != "") 
	{
		$sql.= " WHERE year LIKE '%{$termYear}%'";
	}
	else if($termName != "" && $termGenre != "" && $termYear == "") 
	{
		$sql.= " WHERE name LIKE '%{$termName}%' AND genre LIKE '%{$termGenre}%'";
	}	
	else if($termName == "" && $termGenre != "" && $termYear != "") 
	{
		$sql.= " WHERE genre LIKE '%{$termGenre}%' AND year LIKE '%{$termYear}%'";
	}	
	else if($termName != "" && $termGenre == "" && $termYear != "") 
	{
		$sql.= " WHERE name LIKE '%{$termName}%' AND year LIKE '%{$termYear}%'";
	}
	else if($termName != "" && $termGenre != "" && $termYear != "") 
	{
		$sql.= " WHERE name LIKE '%{$termName}%' AND genre LIKE '%{$termGenre}%' AND year LIKE '%{$termYear}%'";
	}
	else 
	{
		$sql = "SELECT * FROM retrogames";
	}		
	
	//Run SQL query
	$result = mysqli_query($mysqli, $sql);
	
	//How many rows got returned?
	$num_games = mysqli_num_rows($result);
	
	if($num_games == 0)
		print("<p>We currently don't have that game catagoried.</p>");
	else
	{
		print("<p>We found $num_games game(s) matching that criteria.</p>");
		
		//Loops to print games.
		while($row = mysqli_fetch_assoc($result))
		{
			echo $row['name']. " - ". $row['genre']. " - ". $row['year']. " - ". $row['console'] ."<br>";
		}
	}	
?>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="register.php">Register</a></p>
			<p><a href="changestyle.php">Change Style</a></p>
			<p><a href = "logout.php">Logout</p>
		</footer>
		</main>
		</div>
	</body>
	</html>