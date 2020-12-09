<?php
	
	// Retreive value passed from Ajax call
	$bar1 = $_GET['bar1'];
	
	// Debug message
	echo "Performing search for ".$bar1."...";
	
	
	//Connect to DB server
	include('config.php');	
	if (mysqli_connect_errno($mysqli))  
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
		
	// Fetch matched data from the database 
	$query = $db->query("SELECT * FROM retrogames WHERE name LIKE '%".$bar1."%' AND status = 1 ORDER BY name ASC"); 
 
	// Generate array with skills data 
	$names = array(); 
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){ 
			$data['ID'] = $row['ID']; 
			$data['value'] = $row['name']; 
			array_push($names, $data); 
		} 
	} 
 
	// Return results as json encoded array 
	echo json_encode($names); 
?>