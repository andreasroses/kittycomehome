<?php
session_start();

function getFilename($uploadDir, $ogName) {
    $num = 0;
    $newFilename = $ogName;
    while (file_exists($uploadDir . $newFilename)) {
        $num++;
        $newFilename = pathinfo($ogName, PATHINFO_FILENAME) . "_" . $num . "." . pathinfo($ogName, PATHINFO_EXTENSION);
    }

    return $newFilename;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = './../images/';
    $normalDir = './images/';
    $uploadFile = $uploadDir . basename($_FILES['profPic']['name']);
    $readFile = $normalDir . basename($_FILES['profPic']['name']);

    if (move_uploaded_file($_FILES['profPic']['tmp_name'], $uploadFile)) {
        echo "Image uploaded successfully!";
        require_once("config.php");
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $securityQuestionId = $_POST["security_question"];  
            $securityAnswer = $_POST["security_answer"];  
            $sql = "INSERT INTO accounts (account_fname,account_lname,account_email, account_password,account_imgsrc,security_question_id, security_answer) VALUES ('$fname','$lname','$email', '$pwd','$readFile', '{$_POST["securityQuestion"]}', '{$_POST["securityAnswer"]}')";
            
            if ($db_conn->query($sql) === TRUE) {
                echo "User registered successfully!";
                $user_id = $db_conn->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['isadmin'] = 0;
                $_SESSION['pfpimg'] = $readFile;
                header("Location: ../useraccount.php");
                exit();
            }else {
                echo "Error adding security question and answer: " . $db_conn->error;
            }
        } else {
            echo "Error adding user: " . $db_conn->error;
        }
    }else {
        die("Image upload failed.");
}

?>