<?php

$nums = $_POST['nums'];
$msg = $_POST['msg'];

require('twilio-php/Services/Twilio.php'); 
 
$account_sid = 'AC2eacab37908de822e061ca3366ceb121';
$auth_token = '20f2d580cae5e30b6de5a8cc88fede1c';
$client = new Services_Twilio($account_sid, $auth_token); 


if (isset($nums) && isset($msg)) {
  $num_list = explode(",",$nums);
  
  foreach ($num_list as $num) {
    $num = "+1".$num;
    
    $client->account->messages->create(array( 
    	'To' => $num, 
    	'From' => "+17077444031", 
    	'Body' => $msg,   
    ));
    
  }
}

?>