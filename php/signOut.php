<?php
	session_start();
	
	session_destroy();
	header("refresh:3; url=http://www.am-tech.xyz/index.php");
	die("Thank you for using Pantry Buddy, Redirecting to Sign Page!")
?>