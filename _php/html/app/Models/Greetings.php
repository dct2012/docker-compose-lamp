<?php

namespace App\Models;

use App\DB;

class Greetings {
	protected DB $DB;

	public function __construct( DB $DB ) {
		$this->DB = $DB;
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
}