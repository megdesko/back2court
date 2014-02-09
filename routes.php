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


$all_info = json_decode($_POST);
//$all_info = $_POST;
if (!$_POST) {
	$all_info['method'] = 'get_all_clients'];
}
$function = $all_info['method'];
unset($all_info['method']);
$data = $all_info;
$result = do_call($data, $function);

if (strpos($function, 'get') !== false && $result) {
	while($row = pg_fetch_assoc($result)) {
 		$data[] = $row;		
	}
	$result = true;
}
$result = array('result' => $result, 'data'=>$data);

var_dump($result);
var_dump(json_encode($result));
return json_encode($result);




?>
