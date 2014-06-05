<?php
	// connection info
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "guilded";
	//Connect to MySQL Server
	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
	if (!$db) {
	  echo "Failed to connect to Database: " . mysqli_connect_error();
	}
	
	// Retrieve and escape (prevent SQL injection) data
	$character = $_POST [mysql_real_escape_string('character')];
	$region = $_POST [mysql_real_escape_string('chosen-region')];
	$server = $_POST [mysql_real_escape_string('chosen-server')];
	$faction = $_POST [mysql_real_escape_string('faction')];
	$pscore = $_POST [mysql_real_escape_string('p-score')];
	$ilvl = $_POST [mysql_real_escape_string('ilvl')];
	$role = $_POST [mysql_real_escape_string('role')];
	$classA = $_POST ['classes'];
	$class = implode(", ", $classA);

	// Build and Execute Query
	$query = "INSERT INTO search_forms VALUES('$character','$region','$server','$faction','$pscore','$ilvl','$role','$class')";	
	$result = mysqli_query($db, $query) or die ('Query Failed');

	//echo "$character, $region, $server, $faction, $pscore, $ilvl, $role, $class";

	// If succesful, confirmation post
	echo 'Listing Created';

?>