<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	include('config.php');
	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	//Build query
	$sql = "SELECT * FROM retrogames";
	
	$termName = mysqli_real_escape_string($mysqli,$_POST['addName']);
	$termGenre = mysqli_real_escape_string($mysqli,$_POST['addGenre']);
	$termYear = mysqli_real_escape_string($mysqli,$_POST['addYear']);
	$termConsole = mysqli_real_escape_string($mysqli,$_POST['addConsole']);
	$termDescription = mysqli_real_escape_string($mysqli,$_POST['addDescription']);
	
	
	$sql = "INSERT INTO retrogames (name, genre, year, console, description)
	VALUES ('$termName', '$termGenre', '$termYear', '$termConsole', '$termDescription')";

	if(mysqli_query($mysqli, $sql))
	{
		echo "<p>Game successfully added.</p>";
	}
	else 
	{
		echo "<p>Game failed to add.</p>";	
	}
	
	header('location:editcata.php?status=success');
	}
?>