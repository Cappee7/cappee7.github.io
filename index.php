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

			<!-- Featured Games Section -->
			<section class="featured-games clearfix">
				<h5>Featured NES Games</h5>
				<div class="container-featured">
					<!-- Game 1 -->
					<div class="featured">
						<div class="featured-img" id="art1"></div>
						<h2>The Legend of Zelda</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>

					<!-- Game 2 -->
					<div class="featured">
						<div class="featured-img" id="art2"></div>
						<h2>Super Mario Bros.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>
				</div>

				<div class="container-featured">
					<!-- Game 3 -->
					<div class="featured">
						<div class="featured-img" id="art3"></div>
						<h3>Duck Hunt</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>

					<!-- Game 4 -->
					<div class="featured">
						<div class="featured-img" id="art4"></div>
						<h3>Tetris</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>
				</div>
			</section>

			<!-- Featured Game Boy Games Section -->
			<section class="featured-games clearfix">
				<h5>Featured Game Boy Games</h5>
				<div class="container-featured">
					<!-- Game 1 -->
					<div class="featured">
						<div class="featured-img-gb" id="gb1"></div>
						<h2>Pokemon Red</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>

					<!-- Game 2 -->
					<div class="featured">
						<div class="featured-img-gb" id="gb2"></div>
						<h2>Super Mario Land</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>
				</div>

				<div class="container-featured">
					<!-- Game 3 -->
					<div class="featured">
						<div class="featured-img-gb" id="gb3"></div>
						<h3>Dr. Mario</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>

					<!-- Game 4 -->
					<div class="featured">
						<div class="featured-img-gb" id="gb4"></div>
						<h3>Kirby's Dream Land</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
						</p>
					</div>
				</div>
			</section>
		</main>

		<?php include("footer.php"); ?>
	</div>
</body>

</html>