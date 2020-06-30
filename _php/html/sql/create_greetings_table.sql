CREATE TABLE docker.greetings (
	id INT UNSIGNED auto_increment NOT NULL,
	greeting varchar(255) NOT NULL,
	CONSTRAINT greetings_PK PRIMARY KEY (id),
	CONSTRAINT greetings_UN UNIQUE KEY (greeting)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;
CREATE UNIQUE INDEX greetings_id_IDX USING BTREE ON docker.greetings (id);
