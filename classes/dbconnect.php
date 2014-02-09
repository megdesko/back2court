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
	echo "inside create_client";
	$sql = "INSERT INTO clients (first_name, last_name, phone) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
RETURNING client_id";

	$result = pg_query($this->dbconn, $sql); 
	$the_data = pg_fetch_assoc($result);
	var_dump($the_data);
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

	$sql = "UPDATE clients SET (first_name, last_name, phone) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
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

/**
 * @abstract create new record in the user table
 * @param array $data // contains the data that we need to insert
 *
 */ 

public function create_user($data) {
	$sql = "INSERT INTO users (first_name, last_name, phone) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_user($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM users where user_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_users() {

	$sql = "SELECT * FROM users";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_user($data) {
	if (! is_numeric($data['user_id']) or !$data['user_id']) {return;}

	$sql = "UPDATE users SET (first_name, last_name, phone) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
	WHERE user_id = '".$data['user_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_user($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM users WHERE user_id  = '$id'";
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
	('".$data['demo_name']."', '".$data['phone']."') RETURNING demo_text_id";

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

public function delete_demo_text($id) {
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
 * @abstract create new record in the appointment table
 * @param array $data // contains the data that we need to insert
 *
 */ 
public function create_appointment($data) {
	$sql = "INSERT INTO appointments (client_id, appointment_date,
appointment_time, location) VALUES
	('".$data['client_id']."', '".$data['appointment_date']."',
'".$data['appointment_time']."','".$data['location']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_appointment($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM appointments where appointment_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_appointments() {

	$sql = "SELECT * FROM appointments";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_appointment($data) {
	if (! is_numeric($data['appointment_id']) or !$data['appointment_id']) {return;}

	$sql = "UPDATE appointments SET (client_id, appointment_date, appointment_time, location) =
	('".$data['client_id']."', '".$data['appointment_date']."', '".$data['appointment_time']."','".$data['location']."')
	WHERE appointment_id = '".$data['appointment_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_appointment($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM appointments WHERE appointment_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

/////////////////////////////////////////////
//user
/////////////////////////////////////////////

/**
 * @abstract create new record in the user_client table
 * @param array $data // contains the data that we need to insert
 *
 */ 
public function create_user_client($data) {
	$sql = "INSERT INTO user_clients (first_name, last_name, phone) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_user_client($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM user_clients where user_client_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_user_clients() {

	$sql = "SELECT * FROM user_clients";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_user_client($data) {
	if (! is_numeric($data['user_client_id']) or !$data['user_client_id']) {return;}

	$sql = "UPDATE user_clients SET (first_name, last_name, phone) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
	WHERE user_client_id = '".$data['user_client_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_user_client($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM user_clients WHERE user_client_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function get_user_user_clients($user_id) {
// insert brilliant function here
}

/////////////////////////////////////////
//jurisdictions
/////////////////////////////////////////

/**
 * @abstract create new record in the jurisdiction table
 * @param array $data // contains the data that we need to insert
 *
 */ 
/*
public function create_jurisdiction($data) {
	$sql = "INSERT INTO jurisdictions (first_name, last_name, phone) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_jurisdiction($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM jurisdictions where jurisdiction_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_jurisdictions() {

	$sql = "SELECT * FROM jurisdictions";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_jurisdiction($data) {
	if (! is_numeric($data['jurisdiction_id']) or !$data['jurisdiction_id']) {return;}

	$sql = "UPDATE jurisdictions SET (first_name, last_name, phone) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
	WHERE jurisdiction_id = '".$data['jurisdiction_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_jurisdiction($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM jurisdictions WHERE jurisdiction_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

///////////////////////////////////////////////
// venues
///////////////////////////////////////////////

/**
 * @abstract create new record in the venue table
 * @param array $data // contains the data that we need to insert
 *
 */ 
public function create_venue($data) {
	$sql = "INSERT INTO venues (first_name, last_name, phone) VALUES
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);
	
}

public function get_venue($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM venues where venue_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all_venues() {

	$sql = "SELECT * FROM venues";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}

public function update_venue($data) {
	if (! is_numeric($data['venue_id']) or !$data['venue_id']) {return;}

	$sql = "UPDATE venues SET (first_name, last_name, phone) =
	('".$data['first_name']."', '".$data['last_name']."', '".$data['phone']."')
	WHERE venue_id = '".$data['venue_id']."'";

	$result = pg_query($this->dbconn, $sql); 

	return ($result);

}

public function delete_venue($id) {
	// if we don't have an id here, abort so we don't kill the db
	if (! is_integer($id) or !$id ) { return; }
	
	$sql = "DELETE FROM venues WHERE venue_id  = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);

}






}
?>
