<?php

// Check if constants are not already defined before defining them
if (!defined('DB_SERVER')) {
    define('DB_SERVER', '127.0.0.1');
}

if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'cs341webtech');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'bc2025');
}

// Establish database connection
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 

/* $hostname = 'localhost';
$dbname = 'bc2025';
$port = 3390;
$username = 'root';
$password = '';

$connection = new mysqli($hostname, $username, $password, $dbname, $port);


if ($connection->connect_error) {

    die("Connection failed: " . $connection->connect_error);
}
 */
//echo "Connected successfully";


?>
