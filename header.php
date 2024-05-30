<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cappee.</title>
    <link rel="stylesheet" href="<?php echo $style; ?>">
</head>
<body>

<header>

<form method="post">
        <button type="submit" name="switch-style" id="stylebutton">
            <img src="media/switch-style-icon.png" alt="Switch Style">
        </button>
    </form>
    
<!-- <h1 id="typewriter"></h1> -->
<h1>Cappee.</h1>
</header>

<?php include 'navbar.php'; ?>

<section>

<script>
    // JavaScript for the typewriter effect
    document.addEventListener('DOMContentLoaded', function () {
        var typewriterText = "Cappee.";
        var element = document.getElementById('typewriter');
        var speed = 100; // Adjust the typing speed (milliseconds per character)
        
        function typeWriter(text, i) {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(function () {
                    typeWriter(text, i);
                }, speed);
            }
        }

        typeWriter(typewriterText, 0);
    });
</script>