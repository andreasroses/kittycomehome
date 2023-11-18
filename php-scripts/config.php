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
} else {
    echo "Connected to the database successfully.";
}

// Ensure proper character set
if (!$db_conn->set_charset("utf8")) {
    die("Error setting charset: " . $db_conn->error);
}

// Test query to check database connection and permissions
$query = "SELECT 1";
$result = $db_conn->query($query);

// Check if the test query was successful
if (!$result) {
    die("Error in test query: " . $db_conn->error);
} else {
    echo "Test query executed successfully.";
}

// Close the database connection
$db_conn->close();
?>