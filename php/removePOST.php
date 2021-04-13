<?php
	session_start();
	
	// START OF DATABASE CONNECTION AND GRABBING DATABASE INFO
			
			// Connecting to the Database
			require_once("../db/credentials.php");
			$connection = new mysqli($host, $user, $pass, $db);
			
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