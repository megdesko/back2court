<?php
//include_once("./classes/clients.php");
//include_once("./classes/crud.php");
include_once("./classes/dbconnect.php");

$connection = new dbconnect();


$sql= "DROP TABLE clients;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";


$sql= "CREATE TABLE IF NOT EXISTS clients (
	client_id   serial primary key,
	first_name  varchar(100),
	last_name   varchar(100),
	phone_1     varchar(15),
	case_number varchar(50)
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "DROP TABLE appointments;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "CREATE TABLE IF NOT EXISTS appointments (
	appointment_id 			serial primary key,
	client_id   			integer,
	appointment_date		date,
	appointment_time  		time without time zone,
	location				varchar(250)
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
echo "I am finished with my setup routine.";
?>
