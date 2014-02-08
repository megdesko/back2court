<?php
/**
 * @abstract crud class to deal with db CRUD operations
 * @author megdesko
 * @copyright Back2Court
 * 
 */


include_once("./dbconnect.php");
include_once("./crud.php");

class clients extends crud{

var $table = 'clients';

public function __construct() {
	parent::__construct();
}

}

?>
