<?php

class dbconnect {

var $dbconn;
var $table;
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

/**
 * @abstract create new record in the client table
 * @param array $post // contains the data that we need to insert
 *
 */ 

public function create_client($data) {
echo "inside create";	

var_dump($data);
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	if ($result) echo "there is something in the db!";
	else "insert failed";

	echo "about to return from create fn";
	return ($result);
	
}

public function get_one($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM $this->table WHERE ";
	$sql .= $this->table_id  . "_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "SELECT * FROM $this->table";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function delete($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM $this->table WHERE ";
	$sql .= $this->table_id  . "_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

}

?>

}
?>
