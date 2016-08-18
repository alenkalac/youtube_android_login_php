<?php

	/**
	*	Video can be found here
	* 	https://www.youtube.com/watch?v=2Xu060tXA-E
	*/

	//require the Database.php. 
	require_once 'Database.php';
	
	//check if login is set in the post
	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//create a new instance of the databse
		$db = new Database();

		//prepare a statament to execute
		$query = $db->getDB()->prepare("SELECT * FROM users WHERE username = :USERNAME");

		//replace the place holders with actual values and execute
		$query->execute([
			":USERNAME" => $username,
		]);

		//fetch the results returned by the execution of the above query
		$result = $query->fetch(PDO::FETCH_ASSOC);

		//verify the password against the password stored in the DB
		if(password_verify($password, $result['password'])) {
			echo true;
		} else {
			echo false;
		}
		
	}
