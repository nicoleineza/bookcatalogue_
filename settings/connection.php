<?php

$hostname = 'localhost';
$dbname = 'catalogue';
$port = 3390;
$username = 'root';
$password = '';

$db = new mysqli($hostname, $username, $password, $dbname, $port);


if ($db->connect_error) {

    die("Connection failed: " . $db->connect_error);
}

//echo "Connected successfully";
