<?php
//connects to our localhost serer
$server ='localhost';
$user = 'root';
$pass = "";
$dbName = "ragnarok_db";

$connection = new mysqli($server, $user, $pass, $dbName);

//kill file if the connection fails
if($connection->connect_error) {
    die("error: no connection");
}
//$connection->query("use ragnarok_db;");
//$query = $connection->query("select * from users");

?>