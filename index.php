<?php

echo "Hello Team Back2Court!!  I want a db connection";







$dbconn = pg_connect("host=ec2-54-197-241-95.compute-1.amazonaws.com port=5432
dbname=d9g8fdnb8rv1ci user=plszpihaesglmk password=oqrfEGFmeUP9WHMg6sX8rU6T1q
sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: '
. pg_last_error());


if ($dbconn) echo "<br> I have a connection!  Whooppeee!";

# This function reads your DATABASE_URL configuration automatically set by
# Heroku
# the return value is a string that will work with pg_connect
/*
function pg_connection_string() {
	return "dbname=d9g8fdnb8rv1ci host=ec2-54-197-241-95.compute-1.amazonaws.com port=5432
user=plszpihaesglmk password=oqrfEGFmeUP9WHMg6sX8rU6T1q sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error."
    exit;
}
 
$result = pg_query($db, "SELECT * from clients");
if (!$result) {
	echo "I have no results :-(";
}
*/
?>
