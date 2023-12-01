<?php
session_start();

function getFilename($uploadDir, $ogName)
{
    $num = 0;
    $newFilename = $ogName;
    while (file_exists($uploadDir . $newFilename)) {
        $num++;
        $newFilename = pathinfo($ogName, PATHINFO_FILENAME) . "_" . $num . "." . pathinfo($ogName, PATHINFO_EXTENSION);
    }

    return $newFilename;
}

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
            echo "Image uploaded successfully!";

            $sql = "INSERT INTO accounts (account_fname,account_lname,account_email, account_password,account_imgsrc) VALUES ('$fname','$lname','$email', '$pwd','$readFile')";
            if ($db_conn->query($sql) === TRUE) {
                echo "User registered successfully!";
                $user_id = $db_conn->insert_id;
                //insert into account_security table
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', '$securityQuestionId', '$securityAnswer1')";
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', '$securityQuestionId', '$securityAnswer2')";
                $sqlSecurity = "INSERT INTO account_security (account_id, security_questions_id, security_answer) VALUES ('$user_id', '$securityQuestionId', '$securityAnswer3')";
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
            $error = "Image upload failed.";
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