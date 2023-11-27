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

<div class="logindiv">
    <section">

        <h3>Login</h3>

        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" id="loginbutton">Login</button>

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

        <p></p>

        </section>

</div>

<?php include 'footer.php'; ?>