<?php

// Include the database configuration
include 'config.php';

// Retrieve form data
$cat = $_POST['cat'];
$desc = $_POST['desc'];

// Assuming you have a session variable for account_id, replace $_SESSION['account_id'] with your actual session variable
$account_id = $_SESSION['user_id'];

// Handle file upload
$uploadDir = './../images/';
$uploadFile = $uploadDir . basename($_FILES['postimg']);

if (move_uploaded_file($_FILES['postimg'], $uploadFile)) {
    echo "Image uploaded successfully!";
} else {
    die("Image upload failed.");
}

// Insert data into the 'fostercat' table
$query = "INSERT INTO post (account_id, cat_id, post_desc, post_imgsrc)
          VALUES ('$account_id', '$cat', $desc, $uploadFile)";

$result = $mysqli->query($query);

if (!$result) {
    die("Error in query: " . $mysqli->error);
} else {
    echo "Foster cat information submitted successfully!";
}

// Close the database connection
$mysqli->close();
?>