<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");

    $email = $_POST["email"];
    $sql = "SELECT security_questions_id, security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email'";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 3) {
        $_SESSION['tmpEmail'] = $email;
        header("Location: ../securityquestions.php");
        exit();
    }
    else{
        $error = "Security Questions not answered. Contact support.";
    }
}
?>