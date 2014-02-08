<?php
include("./classes/dbconnect.php");

echo "lalalala no connection yet";

$connection = new dbconnect();

if ($connection->dbconn) echo "I have a connection!";
else echo "I am sad";
echo "<br><br>";
echo "Hello from the setup page!"

?>
