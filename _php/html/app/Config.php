<?php


namespace App;


class Config {
	protected string $dbUserName;
	protected string $dbPassword;
	protected string $dbDsn;

	public function __construct( array $config ) {
		$this->dbUserName = $config[ 'dbUserName' ];
		$this->dbPassword = $config[ 'dbPassword' ];

		$dbHost      = $config[ 'dbHost' ];
		$dbPort      = $config[ 'dbPort' ];
		$dbName      = $config[ 'dbName' ];
		$this->dbDsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName";
	}

	/** @return string */
	public function getDbDsn(): string {
		return $this->dbDsn;
	}

	/** @return mixed|string */
	public function getDbPassword() {
		return $this->dbPassword;
	}

	/** @return mixed|string */
	public function getDbUserName() {
		return $this->dbUserName;
	}
}