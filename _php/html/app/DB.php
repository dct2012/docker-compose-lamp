<?php


namespace App;

use PDO;

class DB {
	protected PDO $PDO;
	protected Config $Config;

	public function __construct( Config $Config ) {
		$this->Config = $Config;
		$this->PDO    = new PDO(
			$this->Config->getDbDsn(),
			$this->Config->getDbUserName(),
			$this->Config->getDbPassword()
		);
	}

	public function query( string $stmt ) {
		return $this->PDO->query( $stmt, PDO::FETCH_ASSOC )->fetch();
	}

	public function select( string $from, string $cols = '*', string $cond = '' ): array {
		$stmt = "SELECT $cols FROM $from";
		if( !empty( $cond ) ) {
			$stmt = "$stmt $cond";
		}

		return $this->query( $stmt ) ?? [];
	}

	/**
	 * @param string $tableName
	 * @return bool
	 */
	public function doesTableExist( string $tableName ): bool {
		$dbName = $this->Config->getDbName();
		$stmt   = "SHOW TABLES WHERE `Tables_in_$dbName` = '$tableName'";
		$result = $this->query( $stmt );

		return !empty( $result );
	}
}