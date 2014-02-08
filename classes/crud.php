<?php
/**
 * @abstract crud class to deal with db CRUD operations
 * @author megdesko
 * @copyright Back2Court
 * 
 */


include("./dbconnect.php");

class crud extends dbconnect{

var $table;

public function __construct() {
	parent::__construct();
}

/**
 * @abstract create new record in the table
 * @param array $post // contains the data that we need to insert
 *
 */ 

public function create($post) {
	
	$sql = "INSERT INTO $this->table  SET ";

	foreach ($post as $column => $value) {
		$sql .= $column . " = '" . pg_escape_literal($value) . "'";	
	}	
	var_dump($sql);	
	$result = pg_query($this->dbconn, $sql);

	return ($result);
	
}

public function get_one($id) {
	if (! is_integer($id) or !$id ) { return; }

	$sql = "SELECT * FROM $this->table WHERE ";
	$sql .= $this->table_id  . "_id = '$id'";
	$result = pg_query($this->dbconn, $sql);

	return ($result);
}

public function get_all() {

	$sql = "SELECT * FROM $this->table";
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
