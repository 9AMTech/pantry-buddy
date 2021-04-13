<?php
	session_start();
	$username = addslashes(trim($_POST['username']));
	$password = addslashes(trim($_POST['password']));
	$submit = $_POST['submit'];
	
	//Encrypting the Password
    $password = md5($password);
	
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
		SELECT * FROM Users
		WHERE username = '$username' AND password = '$password'
	*/
	$sql = "SELECT Users.userID, Users.firstname, Users.lastname,
			Users.email, Users.address, Users.state, Users.password,
			Users.country, Users.gender, Users.username
			FROM Users
			WHERE username = '$username' AND password = '$password'";
	
	$result = $connection->query($sql);
	
	// Create the row association to compare username and password combination
	// Setting up all the session variables for a custom experience
	$row = $result->fetch_assoc();
	if ($row['username'] == $username && $row['password'] == $password){
		$_SESSION['username'] = $username;
		$_SESSION['submit'] = $submit;
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['state'] = $row['state'];
		$_SESSION['country'] = $row['country'];
		$_SESSION['gender'] = $row['gender'];
		echo "<p>Login Successful! Please wait to be redirected!</p>";
		header("refresh:3; url=http://www.am-tech.xyz/index.php");
	}
	else
	{
		header("refresh:3; url=http://www.am-tech.xyz/php/signIn.php");
		die("Invalid Username/Password Combo! Refresh the Page...");
	}
?>