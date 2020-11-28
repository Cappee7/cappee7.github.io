<?php 
	//Connect to DB server
	$mysqli = mysqli_connect("localhost", "1905485", "AshOnMYLINUX", "db1905485");
	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	//Build query
	$sql = "SELECT GameName, GameGenre, GameYear FROM Games";
	
	// Add search criteria, if provided
	if($_POST['searchName'] != "") 
	{
		$sql.= " WHERE GameName LIKE '%" . $_POST['searchName'] . "%'";
	}
	else 
	{
		$sql = "SELECT GameName, GameGenre, GameYear FROM Games";
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
			echo $row['GameName']. " - ". $row['GameGenre'] ."<br>";
		}
	}	
?>