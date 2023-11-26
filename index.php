<?php
session_start();

// Check if the style has been set in the session, otherwise use the default style
$style = isset($_SESSION['style']) ? $_SESSION['style'] : 'css/darkmode.css';

// Handle form submission to switch styles
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['switch-style'])) {
    $style = ($style === 'css/darkmode.css') ? 'css/lightmode.css' : 'css/darkmode.css';
    $_SESSION['style'] = $style;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cappee</title>
    <link rel="stylesheet" href="<?php echo $style; ?>">
</head>
<body>

<header>
    <h1>Cappee</h1>
</header>

<!-- Navigation Bar -->
<nav>
    <a href="index.php">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</nav>

<section>
    <p>W.I.P.</p>
    <p>Current date and time: <?php echo date('Y-m-d H:i:s'); ?></p>
</section>

<footer>
    <form method="post">
        <button type="submit" name="switch-style">Switch Style</button>
    </form>
    <p>&copy; <?php echo date('Y'); ?> Cappee. All rights reserved.</p>
</footer>

</body>
</html>
