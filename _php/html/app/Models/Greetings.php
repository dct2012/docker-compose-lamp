<?php

namespace App\Models;

use App\DB;

class Greetings {
	protected DB $DB;

	public function __construct( DB $DB ) {
		$this->DB = $DB;

		if( !$this->doesGreetingsTableExist() ) {
			if( $this->createGreetingsTable() ) {
				$this->populateGreetingTable();
			}
		}
	}

	/** @return string */
	public function getGreeting(): string {
		$result = $this->DB->select( 'greetings', 'greeting', 'WHERE id = 1' );

		return $result[ 'greeting' ];
	}

	/** @return bool */
	protected function doesGreetingsTableExist(): bool {
		return $this->DB->doesTableExist( 'greetings' );
	}

	/** @return bool */
	protected function createGreetingsTable(): bool {
		$stmt = "CREATE TABLE greetings (
	id INT UNSIGNED auto_increment NOT NULL,
	greeting varchar(255) NOT NULL,
	CONSTRAINT greetings_PK PRIMARY KEY (id),
	CONSTRAINT greetings_UN UNIQUE KEY (greeting)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;
CREATE UNIQUE INDEX greetings_id_IDX USING BTREE ON greetings (id);";
		$this->DB->query( $stmt );

		return $this->doesGreetingsTableExist();
	}

	/** @return bool */
	protected function populateGreetingTable(): bool {
		$stmt   = "INSERT INTO `greetings` VALUES (1,'Hello World, from MariaDB!')";
		$result = $this->DB->query( $stmt );

		return !empty( $result );
	}
}