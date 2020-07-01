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

		if( !$this->doesGreetingsTableExist() ) {
			if( $this->createGreetingsTable() ) {
				$this->populateGreetingTable();
			}
		}
	}

	/** @return string */
	public function getGreeting(): string {
		$stmt   = 'SELECT greeting FROM greetings WHERE id = 1';
		$result = $this->PDO->query( $stmt, PDO::FETCH_ASSOC )->fetch();

		return $result[ 'greeting' ];
	}

	/** @return bool */
	protected function doesGreetingsTableExist(): bool {
		return $this->doesTableExist( 'greetings' );
	}

	/**
	 * @param string $tableName
	 * @return bool
	 */
	protected function doesTableExist( string $tableName ): bool {
		$dbName = $this->Config->getDbName();
		$stmt   = "SHOW TABLES WHERE `Tables_in_$dbName` = '$tableName'";
		$result = $this->PDO->query( $stmt, PDO::FETCH_ASSOC )->fetch();

		return !empty( $result );
	}

	/** @return bool */
	protected function createGreetingsTable(): bool {
		$dbName = $this->Config->getDbName();
		$stmt   = "CREATE TABLE $dbName.greetings (
	id INT UNSIGNED auto_increment NOT NULL,
	greeting varchar(255) NOT NULL,
	CONSTRAINT greetings_PK PRIMARY KEY (id),
	CONSTRAINT greetings_UN UNIQUE KEY (greeting)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;
CREATE UNIQUE INDEX greetings_id_IDX USING BTREE ON $dbName.greetings (id);";
		$this->PDO->query( $stmt, PDO::FETCH_ASSOC )->fetch();

		return $this->doesGreetingsTableExist();
	}

	/** @return bool */
	protected function populateGreetingTable(): bool {
		$stmt   = "INSERT INTO `greetings` VALUES (1,'Hello World, from MariaDB!')";
		$result = $this->PDO->query( $stmt, PDO::FETCH_ASSOC )->fetch();

		return !empty( $result );
	}
}