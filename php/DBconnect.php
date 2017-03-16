<?php
class DBConnect {
	protected $_pdo;

	public function __construct() {
    	$dbUserName = 'root';
    	$dbAddress = 'localhost';
    	$dbDatabase = 'ksp';
    	$dsn = 'mysql:host='.$dbAddress.';dbname='.$dbDatabase;

    	$pdo = new PDO($dsn, $dbUserName, DBPASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);

		$this->_pdo=$pdo;
	}

	public function select($sql, $params) {
		try {
			$statement = $this->_pdo->prepare($sql);
			$statement->execute($params);
			$result = $statement->fetchAll();
		} catch (PDOException $e) {
           	die('Connection failed: ' . $e->getMessage());
       	}
		return $result;
	}

	public function change($sql,$params) {
		try {
			$statement = $this->_pdo->prepare($sql);
			$statement->execute($params);
		} catch (PDOException $e) {
           	die('Connection failed: ' . $e->getMessage());
       	}
       	return TRUE;
	}
}