<?php


namespace App;

use PDO;
use Exception;

class DB {
	protected PDO $PDO;

	public function __construct() {
		$dbHost     = 'mariadb';
		$dbPort     = '3306';
		$dbName     = 'docker';
		$dbUserName = 'docker';
		$dbPassword = 'docker';

		$dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName";

		$this->createConnection( $dsn, $dbUserName, $dbPassword );
	}

	protected function createConnection( string $dsn, string $username, string $password ) {
		try {
			$this->PDO = new PDO( $dsn, $username, $password );
		} catch( Exception $e ) {
			var_dump( $e->getMessage() );
		}
	}

	public function getGreeting(): string {
		$result = $this->PDO->query( 'SELECT greeting FROM greetings WHERE id = 1', PDO::FETCH_ASSOC )->fetch();
		return $result[ 'greeting' ];
	}
}