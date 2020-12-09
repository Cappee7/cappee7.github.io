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
<title>RGC - Change Password</title>
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
					<li><a href="editcata.php">Edit Catalogue</a></li>					
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
			<h2>Change Password</h2>
			<form method = "POST">
                <label>Enter your Username: </label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Enter your old Password: </label><input type = "password" name = "oldpassword" class = "box" /><br/><br />
                <label>Enter your new Password: </label><input type = "password" name = "newpassword" class = "box" /><br/><br />
                <label>Confirm your new Password: </label><input type = "password" name = "confpass" class = "box" /><br/><br />
                <input type = "submit" value = "Change Password"/><br />
                <?php
		            include("config.php");
					if($_SERVER["REQUEST_METHOD"] == "POST") {
						// username and password sent from form 
						$myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
						$myoldpassword = mysqli_real_escape_string($mysqli,$_POST['oldpassword']); 
						$mynewpassword = mysqli_real_escape_string($mysqli,$_POST['newpassword']); 
						$conpassword = mysqli_real_escape_string($mysqli,$_POST['confpass']); 
												
						if($myusername == "")
						{
							echo "<p>Please enter a username.</p>";
						}
						else 
						{
							$sql = "SELECT password FROM userbase WHERE username = '$myusername' AND password = '$myoldpassword'";
							
							if(mysqli_query($mysqli,$sql))
							{
								if($conpassword != $mynewpassword)
								{
									echo "<p>Passwords do not match.</p>";
								}
								else if($conpassword == $mynewpassword && $mynewpassword != "")
								{
									$sql = "UPDATE userbase SET password = '$mynewpassword' WHERE username = '$myusername'";
									if(mysqli_query($mysqli, $sql))
									{
										echo "<p>Password successfully updated.</p>";
									}
									else 
									{
										echo "<p>Error changing password." . mysqli_error($mysqli) . "</p>";
									}
								}
								else 
								{
									echo "<p>Password cannot be blank.</p>";
								}
							}
							else 
							{
								echo "<p>Error changing password.</p>";
							}
						}
					}
                ?>
            </form>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="changestyle.php">Change Style</a> <a href="register.php">Register</a> <a href = "deleteaccount.php">Delete Account</a> <a href = "changepassword.php">Change Password</a> <a href = "logout.php">Logout</a></p>
		</footer>
		</main>
		</div>
	</body>
	</html>
