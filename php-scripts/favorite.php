<?php
session_start();
include 'config.php';

echo "account_id: $account_id, cat_id: $cat_id";

if (isset($_SESSION['account_id']) && isset($_POST['cat_id'])) {
    $account_id = $_SESSION['account_id'];
    $cat_id = mysqli_real_escape_string($db_conn, $_POST['cat_id']);

    // Check if the cat is already in favorites
    $checkQuery = "SELECT * FROM favorite WHERE account_id = $account_id AND cat_id = $cat_id";
    $checkResult = $db_conn->query($checkQuery);

    if ($checkResult->num_rows == 0) {
        // Cat not in favorites, add to favorites
        $insertQuery = "INSERT INTO favorite (account_id, cat_id) VALUES ($account_id, $cat_id)";
        $db_conn->query($insertQuery);
        echo "Cat added to favorites!";
    } else {
        // Cat already in favorites, remove from favorites
        $deleteQuery = "DELETE FROM favorite WHERE account_id = $account_id AND cat_id = $cat_id";
        $db_conn->query($deleteQuery);
        echo "Cat removed from favorites!";
    }
} else {
    echo "Error: Unauthorized access or missing parameters.";
}
?>
