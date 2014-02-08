<?php
include("./classes/dbconnect.php");

echo "lalalala no connection yet";

$connection = new dbconnect();

if ($connection->dbconn) echo "I have a connection!";
else echo "I am sad";
echo "<br><br>";

$sql= "CREATE TABLE clients (
	client_id   integer,
	first_name  varchar(50),
	last_name   varchar(100),
	phone_1     varchar(15)
);";

$result = pg_query($connection->dbconn, $sql); 

if ($result) echo "I have a client table<br><br>";
else echo "client table failed";

echo "<hr>";
echo "I am finished with my setup routine.";
?>
