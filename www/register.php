<?php

	/**
	*	Video can be found here
	* 	https://www.youtube.com/watch?v=2Xu060tXA-E
	*/

	require_once 'Database.php';
	
	if(isset($_POST['register'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		//hash the password using secure salt and algo
		$password = password_hash($password, PASSWORD_DEFAULT);

		//create a new instance of the database object
		$db = new Database();

		//prepare a query to insert a new user into the database
		$query = $db->getDB()->prepare("INSERT INTO users VALUES(NULL, :USERNAME, :PASSWORD)");

		//repace the placeholders with actual values and execute.
		$query->execute([
			":USERNAME" => $username,
			":PASSWORD" => $password,
		]);
	}
