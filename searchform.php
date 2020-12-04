<?php 
	//Connect to DB server
	$mysqli = mysqli_connect("localhost", "1905485", "AshOnMYLINUX", "db1905485");
	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	//Build query
	$sql = "SELECT * FROM retrogames";
	
	$termName = $_POST['searchName'];
	$termGenre = $_POST['searchGenre'];
	
	// Add search criteria, if provided
	if($termName != "" && $termGenre == "") 
	{
		$sql.= " WHERE name LIKE '%{$termName}%'";
	}
	else if($termName == "" && $termGenre != "") 
	{
		$sql.= " WHERE genre LIKE '%{$termGenre}%'";
	}
	else if($termName != "" && $termGenre != "") 
	{
		$sql.= " WHERE name LIKE '%{$termName}%' AND genre LIKE '%{$termGenre}%'";
	}
	else 
	{
		$sql = "SELECT * FROM retrogames";
	}		
	
	//Run SQL query
	$result = mysqli_query($mysqli, $sql);
	
	//How many rows got returned?
	$num_games = mysqli_num_rows($result);
	
	if($num_games == 0)
		print("<p>We currently don't have that game catagoried.</p>");
	else
	{
		print("<p>We found $num_games game(s) matching that criteria.</p>");
		
		//Loops to print games.
		while($row = mysqli_fetch_assoc($result))
		{
			echo $row['name']. " - ". $row['genre']. " - ". $row['year']. " - ". $row['console'] ."<br>";
		}
	}	
?>