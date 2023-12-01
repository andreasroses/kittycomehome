<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confpwd = $_POST["cpwd"];
    $securityAnswer1 = $_POST["security_answer1"];
    $securityAnswer2 = $_POST["security_answer2"];
    $securityAnswer3 = $_POST["security_answer3"];
    $uploadDir = './../images/';
    $normalDir = './images/';
    $uploadFile = $uploadDir . basename($_FILES['profPic']['name']);
    $readFile = $normalDir . basename($_FILES['profPic']['name']);
    if ($pwd == $confpwd) {
        if (move_uploaded_file($_FILES['profPic']['tmp_name'], $uploadFile)) {

            $sql = "INSERT INTO accounts (account_fname,account_lname,account_email, account_password,account_imgsrc) VALUES ('$fname','$lname','$email', '$pwd','$readFile')";
            if ($db_conn->query($sql) === TRUE) {
                $user_id = $db_conn->insert_id;
                //insert into account_security table
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', 100, '$securityAnswer1')";
                $db_conn->query($sqlSecurity);
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', 101, '$securityAnswer2')";
                $db_conn->query($sqlSecurity);
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', 102, '$securityAnswer3')";
                $db_conn->query($sqlSecurity);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['isadmin'] = 0;
                $_SESSION['pfpimg'] = $readFile;
                header("Location: ../useraccount.php");
                exit();
            } else {
                $error = "Error adding security question and answer: " . $db_conn->error;
            }
        } else {
            $error = "Please select a valid profile photo.";
        }
    } else {
        $error = "Passwords don't match. Please try again.";
    }

} else {
    die("Invalid request method.");
}

$_SESSION["signup_error"] = $error;

// Redirect to the HTML page
header("Location: ../signup-pg.php");
exit();
?>