<?php
	// connection info
	$dbhost = "us-cdbr-east-05.cleardb.net";
	$dbuser = "b6bcac34fb5491";
	$dbpass = "5fddd35ae34c0a6";
	$dbname = "heroku_f37b9a7b0b11ad6";
	//Connect to MySQL Server
	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
	if (!$db) {
	  echo "Failed to connect to Database: " . mysqli_connect_error();
	}
	
	// Retrieve and escape (prevent SQL injection) data
	$guild = $_POST ['chosen-guild'];
	$region = $_POST ['chosen-region'];
	$server = $_POST ['chosen-server'];
	$faction = $_POST ['faction'];
	$pscore = $_POST ['p-score'];
	$ilvl = $_POST ['ilvl'];
	$role = $_POST ['role'];
	$classA = $_POST ['classes'];
	$class = implode(", ", $classA);
	$description = $_POST['textarea'];

	// Build and Execute Query
	$query = "INSERT INTO guild_forms VALUES('$guild','$region','$server','$faction','$pscore','$ilvl','$role','$class', '$description')";	
	$result = mysqli_query($db, $query) or die ('Query Failed');

	// If succesful, confirmation post
	echo 'Listing Created';

?>