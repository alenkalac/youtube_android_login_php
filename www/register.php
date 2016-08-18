<?php

	require_once 'Database.php';
	
	if(isset($_POST['register'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = password_hash($password, PASSWORD_DEFAULT);

		$db = new Database();

		$query = $db->getDB()->prepare("INSERT INTO users VALUES(NULL, :USERNAME, :PASSWORD)");
		$query->execute([
			":USERNAME" => $username,
			":PASSWORD" => $password,
		]);
	}
