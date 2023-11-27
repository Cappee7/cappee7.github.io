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

<?php include 'header.php'; ?>

<section class="othersection">

    <h3>W.I.P</h3>
    
</section>

<section class="weathersection">

    <?php include 'weather.php'; ?>

</section>

<?php include 'footer.php'; ?>



