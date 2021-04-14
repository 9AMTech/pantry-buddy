<?php
        // Retrieving the data from the form
        $firstname = addslashes(trim($_POST['firstname']));
        $lastname = addslashes(trim($_POST['lastname']));
        $email = addslashes(trim($_POST['email']));
        $username = addslashes(trim($_POST['username']));
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);
        $address = addslashes(trim($_POST['address']));
        $state = addslashes(trim($_POST['state']));
        $country = addslashes(trim($_POST['country']));
        $gender = $_POST['gender'];
		

        // Data Validation FUNNNNNNN
        $isValid = true; //Assuming that the form is correct, start the validation
        $errorMessages = null;
		$emailPregMatch = "/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/";
		$passwordWhiteSpacePregMatch = "/\s/";
		$passwordSpecialCharacterPregMatch = "/[\!\@\#\$\%\^\&\*]/";
		$passwordLowerCasePregMatch = "/[a-z]/";
		$passwordUpperCasePregMatch = "/[A-Z]/";
		$passwordNumberPregMatch = "/[0-9]/";
		
        // First Name Field - Empty Field Check
		
        if ($firstname == "")
        {
            $errorMessages[] = "The First Name field can't be empty!<br>";
            $isValid = false;
        }

        // Last Name Field - Empty Field Check

        if ($lastname == "")
        {
            $errorMessages[] = "The Last Name field can't be empty!<br>";
            $isValid = false;
        }

        // Email Field - Empty Field Check

        if ($email == "")
        {
            $errorMessages[] = "The Email field can't be empty!<br>";
            $isValid = false;
        }
		
		// Email Field - Valid Email Check
		
		if (! preg_match($emailPregMatch, $email))
		{
			$errorMessages[] = "Please enter a valid email<br>";
			$isValid = false;
        }
		
		// Username Field - Empty Field Check
		
		if ($username == "")
        {
            $errorMessages[] = "The Username field can't be empty!<br>";
            $isValid = false;
        }
		
		// Password Field - Empty Field Check
		
		if ($password == "")
        {
            $errorMessages[] = "The Password field can't be empty!<br>";
            $isValid = false;
        }
		
		// Password Field - White Spaces Check
		if (preg_match($passwordWhiteSpacePregMatch, $password))
		{
			$errorMessages[] = "The password can't have whitespaces!<br>";
			$isValid = false;
        }		
		
		// Password Field - Special Character Check
		
		if (! preg_match($passwordSpecialCharacterPregMatch, $password))
		{
			$errorMessages[] = "The password must contain at least one of these special characters: !@#$%^&* <br>";
			$isValid = false;
        }
		
		// Password Field - Lowercase Letter Check
		
		if (! preg_match($passwordLowerCasePregMatch, $password))
		{
			$errorMessages[] = "The password must contain at least one lowercase letter! <br>";
			$isValid = false;
        }

		// Password Field - Uppercase Letter Check

		if (! preg_match($passwordUpperCasePregMatch, $password))
		{
			$errorMessages[] = "The password must contain at least one uppercase letter! <br>";
			$isValid = false;
        }
		
		// Password Field - Number Check
		
		if (! preg_match($passwordNumberPregMatch, $password))
		{
			$errorMessages[] = "The password must contain at least one number! <br>";
			$isValid = false;
        }
		
		// Password Confirmation Check
		if ($password !== $confirmPassword)
		{
		$errorMessages[] = "The passwords did not match!<br>";
		$isValid = false;
		}
        
		// IF Valid is True
		
		if($isValid)
        {
			//Encrypting the Password
            $password = md5($password);
            
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
            /*			This query is built to insert all the collected data from the user into the Users table. 
						
			
            INSERT INTO Users(username, password, firstname, lastname, email, address, state, country, gender)
			VALUES ('{$username}' , '{$password}' , '{$firstname}' , '{$lastname}' , '{$email}' , '{$address}' , '{$state}' , '{$country}' , '{$gender}')
            */
            $sql = "INSERT INTO Users(username, password, firstname, lastname, email, address, state, country, gender)
					VALUES ('{$username}' , '{$password}' , '{$firstname}' , '{$lastname}' , '{$email}' , '{$address}' , '{$state}' , '{$country}' , '{$gender}')";
            
            // Run Query
            $result = $connection->query($sql);
			// If it was inputted correctly
            if($result)
            {
                echo "<p>You are now entering the website! </p>";
				header("refresh:3; url=http://www.am-tech.xyz/php/signIn.php");
				echo "<p>Please log in!</p>";
            }
            else
            {
                die("There was an error in signing up!");
            }
        }
        
        else
        {
            foreach ($errorMessages as $message)
            {
                echo $message . "</ br>";
            }
			echo "Redirecting you to the Sign Up Page!";
			header('refresh:4; url=http://www.am-tech.xyz/php/signUp.php');
			die();
        }

?>      
