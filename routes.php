<?php
//include_once("./classes/clients.php");
//include_once("./classes/crud.php");
//include_once("./classes/dbconnect.php");



function do_call($data, $function) {

$method = $_SERVER['REQUEST_METHOD'];

}


$all_info = json_decode($_POST);

$result = do_call($data, $function);
return json_encode($result);




?>
