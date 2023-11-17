<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");
    // Insert user data into the database
    $sql = "INSERT INTO accounts (email, password) VALUES ('$email', '$password')";
    
    if ($db_conn->query($sql) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>