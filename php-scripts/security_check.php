<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");

    $email = $_SESSION["tmpEmail"];
    // $securityQuestion = $_POST["securityQuestion"];
    $userAnswer1 = $_POST["security_answer1"];
    $userAnswer2 = $_POST["security_answer2"];
    $userAnswer3 = $_POST["security_answer3"];

    // Validate the user's answer to the security question
    if (validateSecurityAnswer($email, $userAnswer1, $userAnswer2, $userAnswer3, $db_conn)) {
        // Update the user's password
        header("Location: ../reset_password_pg.php");
        exit();
    } else {
        $error = "Incorrect answer to 1 or more security questions. Please try again.";
    }
}

function validateSecurityAnswer($email, $uA1, $uA2, $uA3, $dbconn)
{
    $count = 0;
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 100";
    $result = $dbconn->query($sql);
    if ($result->num_rows = 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA1) {
            $count++;
        }
    }
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 101";
    $result = $dbconn->query($sql);
    if ($result->num_rows = 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA2) {
            $count++;
        }
    }
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 102";
    $result = $dbconn->query($sql);
    if ($result->num_rows = 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA3) {
            $count++;
        }
    }
    if ($count == 3) {
        return true;
    }
    return false;
}
?>