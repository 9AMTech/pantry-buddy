<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Remove from Pantry</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <script src="http://cdn.date-fns.org/v2.0.0-alpha0/date_fns.min.js"></script>
        <script src="../js/mainScript.js" async defer></script>
    </head>
    <body>
        <header>
            <section class="container">
            <h1 class="logo">PANTRY BUDDY</h1>
                <nav>
                    <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="myPantry.php">MY PANTRY</a></li>
					<li><a href="aboutUs.php">ABOUT US</a></li>
					<?php
					if(isset($_SESSION['submit'])){
					?>
					<li><a href="signOut.php">SIGN OUT</a></li>
					<?php
					}
					else{
					?>
					<li><a href="signPage.php">SIGN IN/UP</a></li>
					<?php
					}
                    ?>
                    <li id="clock-text"></li>
                    </ul>
                </nav>
            </section>
        </header>
        <main>
        <?php
	        //Redirecting the User to Log In.
	    if(! isset($_SESSION['submit'])){
        ?>

        <h1 id="loginErrorMessage">You must be logged in to view this page! Redirecting to home...</h1>
        
        <?php
	        //Will give them 3 seconds to read the redirect message.
            header("Refresh:3;  url=http://www.am-tech.xyz/index.php");
	        die;
        }
        else{ 
			// START OF DATABASE CONNECTION AND GRABBING DATABASE INFO
			// Connecting to the Database
			require_once("../db/credentials.php");
			$connection = new mysqli($host, $user, $pass, $db);
			
			// Verify the Connection
        if($connection->connect_error)
        {
            die("There was an error.");
        }
        else
        {
        // Create Query Message
        /*
            "SELECT Entries.userID, Entries.itemID, Entries.quantity,
                Entries.datePurchased, Entries.dateExpired, Items.itemID,
                Items.item, Items.itemDescription
                FROM Entries
                INNER JOIN Items
                ON Entries.itemID = Items.itemID
                WHERE Entries.userID = '" . $_SESSION['userID'] . "'";
        */
        $sql = "SELECT Entries.userID, Entries.itemID, Entries.quantity,
                Entries.datePurchased, Entries.dateExpired, Entries.entryID,
                Items.itemID, Items.item, Items.itemDescription
                FROM Entries
                INNER JOIN Items
                ON Entries.itemID = Items.itemID
                WHERE Entries.userID = '" . $_SESSION['userID'] . "'";
        
        $result = $connection->query($sql);
        
        // Setting up the row association
        
        if(! empty($result))
        {
        ?>
							
            <!-- Create the row association to get all of the Trips -->
			<section id="toolbar">
            	<a href="http://www.am-tech.xyz/php/add.php"><button id="addItems">Add Items!</button></a>
                <a href="http://www.am-tech.xyz/php/remove.php"><button id="removeItems">Remove Items!</button></a>
            	<a href="http://www.am-tech.xyz/php/edit.php"><button id="editItems">Edit Items!</button></a>
            </section>
            <section id="pantryOwner">
				<h1>Removing from <?php echo $_SESSION['firstname'];?>'s Pantry</h1>
            </section>
			<section id="pantryTableRemove">
				<table>
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th>
                            <th class="itemDescription">
                                Description
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Purchase Date
                            </th>
                            <th>
                                Expiration Date
                            </th>
                            <th>
                                Remove Item
                            </th>
                        </tr>
                </thead>
                <tbody>
        <?php
        while($row = $result->fetch_assoc()) 
        {									
        ?>	    
            <form action="removePOST.php" method=POST>
            <input type="hidden" id="entryID" name="entryID" value="<?php echo $row['entryID'];?>">
                <tr>
                    <td>
                        <?php echo $row['item']?>
                    </td>
                    <td class="itemDescription">
                        <?php echo $row['itemDescription']?>
                    </td>
                    <td>
                        <?php echo $row['quantity']?>
                    </td>
                    <td>
                        <?php echo $row['datePurchased']?>
                    </td>
                    <td class="expirationDate">
                        <?php echo $row['dateExpired']?>
                    </td>
                    <td>
                        <input type="submit" value="Remove Item!">
                    </td>
                </tr>
            </form>
        <?php
        // ENDING INFORMATION ECHO LOOP
        }
        ?>      
                </tbody>
            </table>
        </section>
        <?php
        // START OF ELSE STATEMENT		
        }			
        else
        {
        ?>		
			<p>It appears you have no items! Click the <a href="http://www.am-tech.xyz/php/add.php"><button id="addItems">ADD ITEMS</button></a> button to add some!</p>
			<?php
        }
        }
        }
        ?>
        </main>
        <script src="../js/mainScript.js" async defer></script>
    </body>
</html>