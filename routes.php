<?php
//include_once("./classes/clients.php");
//include_once("./classes/crud.php");
include_once("./classes/dbconnect.php");



function do_call($data, $function) {
	$dbstuff = new dbconnect();
	var_dump($data);
	var_dump($function);
	
	$result = $dbstuff->$function($data);
	var_dump($result);
	return $result;

}

$_POST['demo_name'] = "tester";
$_POST['phone'] = "test_again";
$_POST['method'] = "create_demo_text";

//$all_info = json_decode($_POST);
$all_info = $_POST;

$function = $all_info['method'];
unset($all_info['method']);
$data = $all_info;
$result = do_call($data, $function);
var_dump($result);

$function = 'get_all_demo_texts';
$result = do_call($data, $function);

while($row = pg_fetch_assoc($result)) {
 	var_dump($row);
}



return json_encode($result);




?>
