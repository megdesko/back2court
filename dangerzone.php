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
	phone       varchar(15),
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
$sql= "DROP TABLE users;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "CREATE TABLE IF NOT EXISTS users (
	user_id 			serial primary key,
	phone_number		varchar(15),
	email_address		varchar(100),
	first_name			varchar(100),
	last_name			varchar(100),
	pw					varchar(100)
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "DROP TABLE user_clients;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "CREATE TABLE IF NOT EXISTS user_clients (
	user_client_id 			serial primary key,
	client_id   			integer,
	user_id		   			integer
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "DROP TABLE venues;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "CREATE TABLE IF NOT EXISTS venues (
	venue_id 			serial primary key,
	jurisdiction_id 	integer,
	place_name			varchar(250),
	street_address		varchar(100),
	city				varchar(100),
	state				char(2),
	zip					char(5)
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "DROP TABLE jurisdictions;";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql= "CREATE TABLE IF NOT EXISTS jurisdictions (
	jurisdiction_id		serial,
	jurisdiction_name	varchar(250),
	city				varchar(100),
	county				varchar(100),
	state				char(2)
);";

$result = pg_query($connection->dbconn, $sql); 
if ($result) echo "Executed $sql<br><br>";
echo "<hr>";

// commented out because this is just demo setup stuff
/*

$sql= "CREATE TABLE IF NOT EXISTS demo_text (
	demo_text_id		serial,
	demo_name  			varchar(250),
	phone				varchar(15)
);";

$result = pg_query($connection->dbconn, $sql); 

if ($result) echo "Executed $sql<br><br>";

echo "<hr>";
$sql = "INSERT INTO demo_text (demo_name, phone) VALUES ('Jim Pugh',
'7076846107');";
if ($result) echo "Executed $sql<br><br>";
echo "<hr>";
$sql = "INSERT INTO demo_text (demo_name, phone) VALUES ('Meg Desko',
'6507144716');";
if ($result) echo "Executed $sql<br><br>";
echo "<hr>";
$sql = "INSERT INTO demo_text (demo_name, phone) VALUES ('David Armstrong',
'5109152336');";
if ($result) echo "Executed $sql<br><br>";
echo "<hr>";
*/
echo "I am finished with my setup routine.";
?>
