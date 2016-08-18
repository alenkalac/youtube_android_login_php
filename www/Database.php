<?php 

	class Database {

		private $host = 'localhost:3307';

		private $table = 'app_database';

		private $user = 'root';

		private $pass = '';

		private $db = null;

		public function __construct() {
			try {
				$this->db = new PDO("mysql:host={$this->host};dbname={$this->table}", $this->user, $this->pass);
			} catch(PDOException $e) {
				die("Failed to connect");
			}
		}

		public function getDB() {
			return $this->db;
		}

	}