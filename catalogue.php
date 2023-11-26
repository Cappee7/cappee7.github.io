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
			<!-- First Section -->
			<section class="catalogue clearfix">
				<div class="catalogue-featured">
				<?php 
				//Connect to DB server
				$mysqli = mysqli_connect("localhost", "root", "", "db_retro");
	
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
			<p><a href="changestyle.php">Change Style</a> <a href="register.php">Register</a> <a href = "deleteaccount.php">Delete Account</a> <a href = "changepassword.php">Change Password</a> <a href = "logout.php">Logout</a></p>
		</footer>
	</div>
	</body>
	</html>
