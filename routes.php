<?php
//include_once("./classes/clients.php");
//include_once("./classes/crud.php");
include_once("./classes/dbconnect.php");



function do_call($data, $function) {
	$dbstuff = new dbconnect();
	
	$result = $dbstuff->$function($data);
	return $result;

}

//$_POST['demo_name'] = 'bestest tester';
//$_POST['method'] = 'create_demo_text';
//$_POST['phone'] = '5551212';
//$all_info = json_decode($_POST);

$all_info = $_POST;

//print_r($_POST);
$function = $all_info['method'];
unset($all_info['method']);
$result = do_call($all_info, $function);

//echo __line__ . __file__;
//echo $result;
if (strpos($function, 'create') !== false && $result) {
	$function = str_replace('create', 'get_last', $function);
	$result = do_call(array(), $function);
}

if (strpos($function, 'get') !== false && $result) {
	while($row = pg_fetch_assoc($result)) {
 		$data[] = $row;		
	}
	$result = true;
}

$result = array('result' => $result, 'data'=>$data);

//var_dump($result);
//var_dump(json_encode($result));
echo json_encode($result);




?>
