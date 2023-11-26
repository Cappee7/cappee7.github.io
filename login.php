<?php
session_start();

$style = isset($_COOKIE["selectedStyle"]) ? $_COOKIE["selectedStyle"] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width">
	<title>Retro Games Catalogue</title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.search-box input[type="text"]').on("keyup input", function () {
				var inputVal = $(this).val();
				var resultDropdown = $(this).siblings(".result");

				if (inputVal.length) {
					$.get("ajaxsearch.php", { term: inputVal }).done(function (data) {
						resultDropdown.html(data);
					});
				} else {
					resultDropdown.empty();
				}
			});

			$(document).on("click", ".result p", function () {
				var searchInput = $(this).parents(".search-box").find('input[type="text"]');
				searchInput.val($(this).text());
				$(this).parent(".result").empty();
			});
		});
	</script>
</head>

<body>
	<link rel="stylesheet" href="css/style<?= $style; ?>.css">
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