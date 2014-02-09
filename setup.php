<?php
//include_once("./classes/clients.php");
//include_once("./classes/crud.php");
include_once("./classes/dbconnect.php");

echo "lalalala no connection yet";
$connection = new dbconnect();
if ($connection->dbconn) echo "I have a connection!";
else echo "I am sad";
echo "<br><br>";
/*
$sql= "CREATE TABLE IF NOT EXISTS clients (
	client_id   serial primary key,
	first_name  varchar(50),
	last_name   varchar(100),
	phone_1     varchar(15)
);";

$result = pg_query($connection->dbconn, $sql); 

if ($result) echo "I have a client table<br><br>";
else echo "client table failed";
echo "<hr>";
*/
$data['first_name'] = "Jim";
$data['last_name'] = "Pugh";
$data['phone_1'] = "650-714-4716";

$table = "clients";
$result = $connection->create_client($data);
var_dump($result);
/*
var_dump($data);

$sql = "INSERT INTO clients (first_name, last_name, phone_1) VALUES
('".$data['first_name']."', '".$data['last_name']."', '".$data['phone_1']."')";

$result = pg_query($connection->dbconn, $sql); 

if ($result) echo "there is something in the db!";
else "insert failed";
*/
$sql = "SELECT * FROM clients";
$result = pg_query($connection->dbconn, $sql);
while ($row =  pg_fetch_assoc($result)) {
var_dump($row);
}
echo "<hr>";


echo "<hr>";
echo "I am finished with my setup routine.";
?>
