<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width">
	<title>RGC - Login</title>
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
		<?php include("header.php"); ?>

		<main class="main clearfix">
			<?php include("search-bar.php"); ?>

			<main class="main clearfix">
				<h2>Login</h2>
				<form method="post">
					<label>Username: </label><input type="text" name="username" class="box" /><br /><br />
					<label>Password: </label><input type="password" name="password" class="box" /><br /><br />
					<input type="submit" value="Login" /><br />
					<?php
					include("config.php");
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						// username and password sent from form 
						$myusername = mysqli_real_escape_string($mysqli, $_POST['username']);
						$mypassword = mysqli_real_escape_string($mysqli, $_POST['password']);

						$sql = "SELECT username FROM userbase WHERE username = '$myusername' AND password = '$mypassword'";
						$result = mysqli_query($mysqli, $sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$count = mysqli_num_rows($result);

						if ($count == 1) {
							$_SESSION["loggedin"] = true;
							$_SESSION["sessionuser"] = $myusername;
							echo "<p>Successfully logged in.</p>";
						} else {
							echo "<p>Details not found. Please try again or register <a href='register.php'>here</a>.</p>";
						}
					}
					?>
				</form>
			</main>

			<?php include("footer.php"); ?>
	</div>
</body>

</html>