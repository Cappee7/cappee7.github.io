<?php
define('db_server', 'localhost');
define('db_username', 'root');
define('db_password', '');
define('db_location', 'db_retro');
$mysqli = mysqli_connect(db_server, db_username, db_password, db_location);

// Check connection
if (!$mysqli) {
   die("Connection failed: " . mysqli_connect_error());
}
?>