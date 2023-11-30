<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");
    $newPassword = $_POST["newPwd"];
    $confirmPassword = $_POST["confirmPwd"];
    $email = $_SESSION["tmpEmail"];
    $sql = "UPDATE accounts SET account_password=$newPassword WHERE account_email=$email";
    if ($newPassword == $confirmPassword) {
        if ($db_conn->query($sql) === TRUE) {
            $success = "Password Updated. Redirecting now...";
            header("Location: ../login-pg.php");
            exit();
        }
        else {
            $error = "Unknown Error: Password failed to be updated";
        }
    }
    else {
        $error = "Passwords didn't match. Please try again";
    }
}
?>