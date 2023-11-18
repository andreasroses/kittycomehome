<?php
// Database configuration
define('DB_HOST', 'kch-db.mysql.database.azure.com');
define('DB_USER', 'adminkch');
define('DB_PASS', 'kchpwd777!');
define('DB_NAME', 'kittycomehomedb');

$db_conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the database connection
if ($db_conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>