  <?php
	session_start();
	
	function pre($array, $die = false)
{
    echo '<pre>'; var_dump($array); echo '</pre>';
    if($die) die();
}

	// START OF DATABASE CONNECTION AND GRABBING DATABASE INFO
			
			// Connecting to the Database
			require_once("../db/credentials.php");
			$connection = new mysqli($host, $user, $pass, $db);
			
			// Verify the Connection
			if($connection->connect_error)
			{
				die("Error Connecting to the Website! Try Again Later!");
			}
			//  Pulling data from the form and storing into variables 
        	$entryID = addslashes(trim($_POST['entryID']));
			$itemName = addslashes(trim($_POST['newItem']));
        	$itemQuantity = addslashes(trim($_POST['newQuantity']));
        	$datePurchased = addslashes(trim($_POST['newPurchaseDate']));
			$expirationDate = addslashes(trim($_POST['newExpirationDate']));
			
			
			$sql = "SELECT Items.item
					FROM Items
					WHERE Items.item = '" . $itemName . "'";
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			
			//IF What the user inputted was an item in table Items
			if(! empty($row)){
			// An SQL Query to get the itemID of the corresponding Item Name
			$sql = "SELECT Items.itemID , Items.item
					FROM Items
					WHERE Items.item = '" . $itemName . "'";
			// Storing the itemID
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			$itemID = $row['itemID'];		
				
			// An SQL Query to add to the users Entries that will show up in myPantry.php
			$sql = "UPDATE Entries
					SET itemID = '{$itemID}' , quantity = '{$itemQuantity}' ,
						datePurchased = '{$datePurchased}' , dateExpired = '{$expirationDate}'
					WHERE entryID = '{$entryID}'";
				
			$result = $connection->query($sql);
			}
			// If what the user inputted was a new item in table Items
			else{
				$sql = "INSERT
						INTO Items (itemID, item, itemDescription)
						VALUES (NULL, '{$itemName}' , 'PENDING')";
				$result = $connection->query($sql);
				
				$sql = "SELECT Items.itemID , Items.item
						FROM Items
						WHERE Items.item = '" . $itemName . "'";
				// Storing the itemID
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				$itemID = $row['itemID'];		
			
				// An SQL Query to add to the users Entries that will show up in myPantry.php
				$sql = "UPDATE Entries
						SET itemID = '{$itemID}' , quantity = '{$itemQuantity}' ,
						datePurchased = '{$datePurchased}' , dateExpired = '{$expirationDate}'
						WHERE entryID = '{$entryID}'";
			
				$result = $connection->query($sql);

			}
			
			echo "<p>The selected item has been edited, please wait to be redirected!</p>";
			header("Refresh:3;  url=http://www.am-tech.xyz/php/myPantry.php");
			die;


?>