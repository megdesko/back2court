<?php
include("./classes/clients.php");

echo "lalalala no connection yet";

$connection = new clients();

if ($connection->dbconn) echo "I have a connection!";
else echo "I am sad";
echo "<br><br>";

$sql= "CREATE TABLE IF NOT EXISTS clients (
	client_id   integer,
	first_name  varchar(50),
	last_name   varchar(100),
	phone_1     varchar(15)
);";

$result = pg_query($connection->dbconn, $sql); 

if ($result) echo "I have a client table<br><br>";
else echo "client table failed";

echo "<hr>";

$data['first_name'] = "Meg";
$data['last_name'] = "Desko";
$data['phone_1'] = "650-714-4716";

var_dump($data);

$new_result = $connection->create($data);
if ($new_result) echo "there is something in the db!";
else "insert failed";

echo "<hr>";
echo "I am finished with my setup routine.";
?>
