<?php

	require_once 'Database.php';
	
	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$db = new Database();

		$query = $db->getDB()->prepare("SELECT * FROM users WHERE username = :USERNAME");

		$query->execute([
			":USERNAME" => $username,
		]);

		$result = $query->fetch(PDO::FETCH_ASSOC);

		if(password_verify($password, $result['password'])) {
			echo true;
		} else {
			echo false;
		}
		
	}
