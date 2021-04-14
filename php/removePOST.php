<?php
	session_start();
	
	// START OF DATABASE CONNECTION AND GRABBING DATABASE INFO
			
			// Connecting to the Database
			//Get Heroku ClearDB connection information
		$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$cleardb_server = $cleardb_url["host"];
		$cleardb_username = $cleardb_url["user"];
		$cleardb_password = $cleardb_url["pass"];
		$cleardb_db = substr($cleardb_url["path"],1);
		$active_group = 'default';
		$query_builder = TRUE;
		// Connect to DB
		$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
			
			// Verify the Connection
			if($connection->connect_error)
			{
				die("Error Connecting to the Website! Try Again Later!");
			}
			
			// Create Query Message
			/*
				This will delete rows from Users Trips that have a selectedID matching
				the ones pulled from removeTrips.php
				
				DELETE
				FROM Users_Trips
				WHERE selectedID = '{$x}'";
			*/
			
				$entryID = addslashes(trim($_POST['entryID']));
				// Create Query Message
				/* 
					This will remove the item with the same entryID as the submit button
					form that was pressed.
				 */
				$sql = "DELETE
						FROM Entries
						WHERE entryID = '{$entryID}'";
				$result = $connection->query($sql);
			
			echo "<p>Selected Items have been deleted, please wait to be redirected!</p>";
			header("Refresh:3;  url=http://www.am-tech.xyz/php/myPantry.php");
			die;
?>