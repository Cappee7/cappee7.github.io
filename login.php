<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, intial-scale=1">
<meta charset="UFT-8">
<title>RGC - Login</title>
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
					<li><a href="basket.php">Add To Catalogue</a></li>					
				</ul>
			</nav>	
		</header>
		<main class="main clearfix">
			<form action="" method="post">
				<input type="text" name="username" placeholder="Username" required>	
				<input type="text" name="password" placeholder="Password" required>	
				<input type="submit" name="Login">
			</form>
			
			<?php
				if(! empty($_POST)) {
					if(isset($_POST['username']) && isset($_POST['password'])) {		
						//Connect to DB server
						$mysqli = mysqli_connect("localhost", "1905485", "AshOnMYLINUX", "db1905485");
						
						$sql = $mysqli -> prepare("SELECT * FROM userbase WHERE username = ?");
						$sql -> bind_param('s', $_POST['username']);
						$sql -> execute();
						$result = $sql -> get_result();
						$user = $result -> fetch_object();
						
						//Verify the password and set the session.
						if(password_verify($_POST['password'], $user -> password)){
							$_SESSION['user_id'] = $user -> ID;
						}
					}
				}
			?>
			
			<footer class="footer">
				<h4>This is the footer content. Change CSS here.</h4>
				<p><a href="changestyle.php">Change Style</a></p>
			</footer>
		</main>
		</div>
	</body>
	</html>
<?php session_destroy(); ?>
