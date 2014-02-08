<?php

class dbconnect {

var $dbconn;

public function __construct() {
	$this->db_connect();
}

public function db_connect() {
	
	if (! $this->dbconn) {

		$this->dbconn = pg_connect("host=ec2-54-197-241-95.compute-1.amazonaws.com port=5432
		dbname=d9g8fdnb8rv1ci user=plszpihaesglmk password=oqrfEGFmeUP9WHMg6sX8rU6T1q
		sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
	} 
	
}


}
?>
