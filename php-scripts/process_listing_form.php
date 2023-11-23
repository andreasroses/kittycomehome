<?php
session_start();
// Include the database configuration
include 'config.php';

// Retrieve form data
$catName = $_POST['catName'];
$catGender = $_POST['catGender'];
$catIsGoodWithCats = isset($_POST['catIsGoodWithCats']) ? 1 : 0;
$catIsGoodWithDogs = isset($_POST['catIsGoodWithDogs']) ? 1 : 0;
$catIsGoodWithKids = isset($_POST['catIsGoodWithKids']) ? 1 : 0;

// Assuming you have a session variable for account_id, replace $_SESSION['account_id'] with your actual session variable
$account_id = $_SESSION['user_id'];

// Handle file upload
$uploadDir = './../images/';
$normalDir = './images/';
$uploadFile = $uploadDir . basename($_FILES['catimg']['name']);
$readFile = $normalDir . basename($_FILES['catimg']['name']);

if (move_uploaded_file($_FILES['catimg']['tmp_name'], $uploadFile)) {
    echo "Image uploaded successfully!";
} else {
    die("Image upload failed.");
}

// Insert data into the 'fostercat' table
$query = "INSERT INTO fostercat (cat_name, cat_gender, cat_isgoodwithcats, cat_isgoodwithdogs, cat_isgoodwithkids, cat_img_src, account_id)
          VALUES ('$catName', '$catGender', $catIsGoodWithCats, $catIsGoodWithDogs, $catIsGoodWithKids, '$readFile', $account_id)";

$result = $db_conn->query($query);

if (!$result) {
    die("Error in query: " . $db_conn->error);
} else {
    echo "Foster cat information submitted successfully!";
}

// Close the database connection
$db_conn->close();
?>
