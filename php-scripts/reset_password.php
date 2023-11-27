<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");

    $email = $_POST["email"];
    $securityQuestion = $_POST["securityQuestion"];
    $userAnswer = $_POST["securityAnswer"];
    $newPassword = $_POST["newPassword"];

    // Validate the user's answer to the security question
    if (validateSecurityAnswer($email, $securityQuestion, $userAnswer, $db_conn)) {
        // Update the user's password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE accounts SET account_password = '$hashedPassword' WHERE account_email = '$email'";
        
        if ($db_conn->query($sql) === TRUE) {
            echo "Password reset successfully!";
            // Redirect to the login page or any other appropriate page
            header("Location: ./login-pg.php");
            exit();
        } else {
            echo "Error updating password: " . $db_conn->error;
        }
    } else {
        echo "Incorrect answer to the security question. Please try again.";
    }
}

function validateSecurityAnswer($email, $securityQuestion, $userAnswer, $db_conn) {
    $sql = "SELECT security_answer FROM accounts WHERE account_email = '$email' AND security_question_id = $securityQuestion";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedAnswer = $row['security_answer'];
        // Use a secure method to compare the answers (e.g., hash comparison)
        return password_verify($userAnswer, $storedAnswer);
    }

    return false;
}
?>
