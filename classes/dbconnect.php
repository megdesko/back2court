<?php

class dbconnect {

var $dbconn;

public function __construct() {
	if (!$this->dbconn) $this->db_connect();
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
 * @param array $data // contains the data that we need to insert
 *
 */ 

public function create_client($data) {
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM clients where client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_client($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "UPDATE clients SET (first_name, last_name, phone_1) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')
	WHERE client_id = '".$data['client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM clients WHERE client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

////////////////////////////
// handle test data
////////////////////////////////

/**
 * @abstract create new record in the test_data table
 * @param array $data // contains the data that we need to insert
 *
 */ 

public function create_demo_text($data) {
	$sql = "INSERT INTO demo_text (demo_name, phone) VALUES
	('".$data['demo_name']."', '".$data['phone']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_demo_text($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM demo_text where demo_text_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_demo_texts() {

	$sql = "SELECT * FROM demo_text";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_demo_text($data) {
	if (! is_numeric($data['demo_text_id']) or !$data['demo_text_id']) {return;}

	$sql = "UPDATE demo_text` SET (demo_name,phone) =
	('".$data['demo_name']."', '".$data['phone']."')
	WHERE demo_text_id = '".$data['demo_text_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM demo_text WHERE demo_text_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}



///////////////////////////////////////////
//appointments
////////////////////////////////////////////

/**
 * @abstract create new record in the client table
 * @param array $data // contains the data that we need to insert
 *
 */ 
/*
public function create_client($data) {
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM clients where client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_client($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "UPDATE clients SET (first_name, last_name, phone_1) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')
	WHERE client_id = '".$data['client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM clients WHERE client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

/////////////////////////////////////////////
//user
/////////////////////////////////////////////

/**
 * @abstract create new record in the client table
 * @param array $data // contains the data that we need to insert
 *
 */ 
/*
public function create_client($data) {
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM clients where client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_client($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "UPDATE clients SET (first_name, last_name, phone_1) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')
	WHERE client_id = '".$data['client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM clients WHERE client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function get_user_clients($user_id) {
// insert brilliant function here
}

/////////////////////////////////////////
//jurisdictions
/////////////////////////////////////////

/**
 * @abstract create new record in the client table
 * @param array $data // contains the data that we need to insert
 *
 */ 
/*
public function create_client($data) {
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM clients where client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_client($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "UPDATE clients SET (first_name, last_name, phone_1) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')
	WHERE client_id = '".$data['client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM clients WHERE client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

///////////////////////////////////////////////
// venues
///////////////////////////////////////////////

/**
 * @abstract create new record in the client table
 * @param array $data // contains the data that we need to insert
 *
 */ 
/*
public function create_client($data) {
	$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM clients where client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_clients() {

	$sql = "SELECT * FROM clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_client($data) {
	if (! is_numeric($data['client_id']) or !$data['client_id']) {return;}

	$sql = "UPDATE clients SET (first_name, last_name, phone_1) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')
	WHERE client_id = '".$data['client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM clients WHERE client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}




*/


}
?>
