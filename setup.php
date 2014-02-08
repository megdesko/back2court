<?php
include(./classes/dbconnect.php);

$connection = new dbconnect();

$db = $connection->db_connect();
if ($db) echo "I have a connection!";
else echo "I am sad";
echo "<br><br>";
echo "Hello from the setup page!"

?>
