<?php
session_start();
// Include the database configuration
include 'config.php';

// Retrieve form data
$cat = $_POST['cat'];
$desc = $_POST['desc'];

// Assuming you have a session variable for account_id, replace $_SESSION['account_id'] with your actual session variable
$account_id = $_SESSION['user_id'];

// Handle file upload
$uploadDir = './../images/';
$normalDir = './images/';
$uploadFile = $uploadDir . basename($_FILES['postimg']['name']);
$readFile = $normalDir . basename($_FILES['postimg']['name']);
if (move_uploaded_file($_FILES['postimg']['tmp_name'], $uploadFile)) {
    echo "Image uploaded successfully!";
} else {
    die("Image upload failed.");
}

// Insert data into the 'fostercat' table
$query = "INSERT INTO post (account_id, cat_id, post_desc, post_imgsrc)
          VALUES ('$account_id', '$cat', '$desc', '$readFile')";

$result = $db_conn->query($query);

if (!$result) {
    die("Error in query: " . $db_conn->error);
} else {
    echo "Foster cat information submitted successfully!";
}

// Close the database connection
$db_conn->close();
header("Location: ../useraccount.php");
?>