<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	include('config.php');
	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	//Build query
	$sql = "SELECT * FROM retrogames";
	
	$termName = mysqli_real_escape_string($mysqli,$_POST['removeName']);
	
	$sql = "DELETE FROM retrogames WHERE name = '$termName'";

	if(mysqli_query($mysqli, $sql))
	{
		echo "<p>Game successfully deleted.</p>";
	}
	else 
	{
		echo "<p>Game failed to delete.</p>";	
	}
	
	header('location:editcata.php?status=success');

}
?>