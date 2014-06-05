<?php
function results(){	
		// initialize API Client & Index
		//$client = new \AlgoliaSearch\Client("W6V2Q1XN6D", "6e18613dfe549928f94518d8657469dc");
		//$index = $client->initIndex('GuildedIndex');

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

		// collect info from searchForm about character that is searching
		$pscore = $_POST ['p-score'];
		$ilvl = $_POST ['ilvl'];
		$role = $_POST ['role'];
		$classA = $_POST ['classes'];
		$class = implode(", ", $classA);

		// query and db result
		$query = "SELECT * FROM guild_forms WHERE role = '$role' 
			AND class like '%$class%' AND progression >= '$pscore' and ilvl <= '$ilvl'";
		$result = mysqli_query($db, $query) or die ('Query Failed');

		// output results in a table
		if ($result) {
			echo "<table>
					<tr>
					<th></th>
				    <th>Guild Name</th>
				    <th>Realm</th>
				    <th>Progression</th>
				    <th>Min. iLvl</th>
				    <th>Role</th>
				    <th>Classes</th>
				  	</tr>
							";
		  // print each row of results in table format
		  while($row = $result->fetch_assoc()) {
		    echo "<tr>
		    			<td><input type='checkbox' id='submit-check'></td> 
		    			<td>$row[guild]</td>
		    			<td>$row[server]</td>
		    			<td>$row[progression]</td>
		    			<td>$row[ilvl]</td>
		    			<td>$row[role]</td>
		    			<td>$row[class]</td>
		    			</tr>";
		}
			echo "</table>";
	}
}
?>