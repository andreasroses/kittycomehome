<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");
    // get user data
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $sql = "SELECT * FROM accounts WHERE account_email = '$email'";
    $result = $db_conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, check the password
        $row = $result->fetch_assoc();
        if ($password == $row["account_password"]) {
            // Password is correct, log in the user
            $_SESSION['user_id'] = $row['account_id'];
            $_SESSION['fname'] = $row['account_fname'];
            $_SESSION['lname'] = $row['account_lname'];
            $_SESSION['pfpimg'] = $row['account_imgsrc'];
            // Redirect to the user's account page
            header("Location: ../useraccount.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "User not found";
    }
}
?>