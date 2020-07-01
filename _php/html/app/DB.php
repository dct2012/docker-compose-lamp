<?php


namespace App;

use PDO;
use Exception;

class DB {
	protected PDO $PDO;

	public function __construct( Config $Config ) {
		try {
			$this->PDO = new PDO( $Config->getDbDsn(), $Config->getDbUserName(), $Config->getDbPassword() );
		} catch( Exception $e ) {
			var_dump( $e->getMessage() );
		}
	}

	public function getGreeting(): string {
		$result = $this->PDO->query( 'SELECT greeting FROM greetings WHERE id = 1', PDO::FETCH_ASSOC )->fetch();
		return $result[ 'greeting' ];
	}
}