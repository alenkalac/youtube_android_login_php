<?php 
	
	/**
	*	Alen Kalac 
	*	18/08/2016
	* 	https://www.youtube.com/watch?v=2Xu060tXA-E
	*/
	class Database {

		/**
		* ip address of the mysql server and port
		* @var string
		*/
		private $host = 'localhost:3307';

		/**
		* database name for this project
		* @var string
		*/
		private $dbname = 'app_database';

		/**
		* mysql username used to log into the database
		* @var string
		*/
		private $user = 'root';

		/**
		* mysql password to be used with the username to log into the database
		* @var string
		*/
		private $pass = '';

		/**
		* PDO instance
		* @var PDO
		*/
		private $db = null;

		/**
		* Default constructor.
		*/
		public function __construct() {
			try {
				$this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
			} catch(PDOException $e) {
				die("Failed to connect");
			}
		}

		/**
		* Get the instance of the PDO object from the class
		* @return PDO
		*/
		public function getDB() {
			return $this->db;
		}

	}