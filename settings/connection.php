<?php

// Check if constants are not already defined before defining them
if (!defined('DB_SERVER')) {
    define('DB_SERVER', '127.0.0.1');
}

if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'gringotts');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '123456');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'BC2025');
}

// Establish database connection
$connection = mysqli_connect($DB_SERVER,$DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
