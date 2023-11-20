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
    $uploadDir = __DIR__ . "/../images/";
    $profPic = $_FILES['profPic'];
    
    if ($profPic['error'] === UPLOAD_ERR_OK) {
        $fileName = getFilename($uploadDir, basename($profPic['name']));
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($profPic['tmp_name'], $uploadPath)) {
            require_once("config.php");
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $sql = "INSERT INTO accounts (account_fname,account_lname,account_email, account_password,account_imgsrc) VALUES ('$fname','$lname','$email', '$pwd','$fileName')";
            
            if ($db_conn->query($sql) === TRUE) {
                echo "User registered successfully!";
                $user_id = $db_conn->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['pfpimg'] = $uploadPath;
                header("Location: ../useraccount.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $db_conn->error;
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error uploading profile picture.";
    }
}
?>