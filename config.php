<?php
define('db_server', 'localhost');
define('db_username', 'user');
define('db_password', '#2149');
define('db_location', 'db_cappee');
$mysqli = mysqli_connect(db_server, db_username, db_password, db_location);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
