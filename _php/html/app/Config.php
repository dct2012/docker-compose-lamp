<?php


namespace App;


class Config {
	protected string $dbName;
	protected string $dbUserName;
	protected string $dbPassword;
	protected string $dbDsn;

	public function __construct( array $config ) {
		$this->dbName     = $config[ 'dbName' ];
		$this->dbUserName = $config[ 'dbUserName' ];
		$this->dbPassword = $config[ 'dbPassword' ];

		$dbHost      = $config[ 'dbHost' ];
		$dbPort      = $config[ 'dbPort' ];
		$this->dbDsn = "mysql:host=$dbHost;port=$dbPort;dbname=$this->dbName";
	}

	/** @return string */
	public function getDbDsn(): string {
		return $this->dbDsn;
	}

	/** @return string */
	public function getDbPassword(): string {
		return $this->dbPassword;
	}

	/** @return string */
	public function getDbUserName(): string {
		return $this->dbUserName;
	}

	/** @return string */
	public function getDbName(): string {
		return $this->dbName;
	}
}