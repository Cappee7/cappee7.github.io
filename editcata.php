<?php 
	if(!isset($_SESSION))
	{	
		session_start();
	}
	if (!isset($_SESSION["loggedin"])) 
	{
		include ("login.php");
	 	exit;
 	}
 	
 	ini_set('display_errors',0)
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width">
<title>RGC - Edit Catalogue</title>
	<?php
		
	if (isset($_COOKIE["selectedStyle"])) { // if style has been set
		$style = $_COOKIE["selectedStyle"];
	} else { // if style not yet set, default to 0
		$style = 0;
	}
	?>
	
    <!-- Remember to change the css to work with the selection <link rel="stylesheet" href="css/style<?= $style; ?>.css"> -->
	<link rel="stylesheet" href="css/style<?= $style; ?>.css">
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
		</header>
		<main class="main clearfix">
			<div class="addcatalogue">
				<h2>Add to Catalogue</h2>
					<form action="addtocata.php" method="POST">
						<input id="nameBar" type="text" name="addName" placeHolder="Enter the games name."/>
						<input id="genreBar" type="text" name="addGenre" placeHolder="Enter the games genre."/>
						<input id="yearBar" type="text" name="addYear" placeHolder="Enter the games year."/>
						<input id="consoleBar" type="text" name="addConsole" placeHolder="Enter the games console."/>
						<input id="descriptionBar" type="text" name="addDescription" placeHolder="Enter a description."/>
						<input id="button" type="submit" name ="addCata" value="Add to catalogue"/>
					</form>
			</div>
			<div class="removecatalogue">
				<h2>Remove from Catalogue</h2>
					<form action="delcata.php" method="POST">
						<select id="name" name="removeName">
						<option value="None">None</option>
						<?php
							include('config.php');
							
							$sql = "SELECT * FROM retrogames";
							$result = mysqli_query($mysqli, $sql);
							while ($row = mysqli_fetch_array($result)) 
							{
							echo '<option>'.$row['name'].'</option>';
							}
						?>
						</select>
						<input id="button" type="submit" name ="delCata" value="Remove from catalogue"/>
					</form>
					<?php
						if( $_GET['status'] == 'success')
							echo '<p>Database edited successfully</p>';
					?>
			</div>
		</main>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="changestyle.php">Change Style</a> <a href="register.php">Register</a> <a href = "deleteaccount.php">Delete Account</a> <a href = "changepassword.php">Change Password</a> <a href = "logout.php">Logout</a></p>
		</footer>
	</div>
	</body>
	</html>
