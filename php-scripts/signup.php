<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = "pfp/";
    $profPic = $_FILES['profPic'];
    if ($profilePicture['error'] === UPLOAD_ERR_OK) {
        $fileName = uniqid() . "_" . basename($profilePic['name']);
        $uploadPath = $uploadDir . $fileName;
        if (move_uploaded_file($profilePicture['tmp_name'], $uploadPath)) {
            require_once("config.php");
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            // Insert user data into the database
            $sql = "INSERT INTO accounts (fname,lname,email, password,img_src) VALUES ('$fname','$lname','$email', '$pwd','$fileName')";
            if ($db_conn->query($sql) === TRUE) {
                echo "User registered successfully!";
                // Fetch the user ID from the database
                $user_id = $db_conn->insert_id;
        
                // Set the user ID in the session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['pfpimg'] = $fileName;
                // Redirect to a welcome page or any other desired page
                header("Location: useraccount.php");
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . $db_conn->error;
            }
        }
        else {
            echo "Error moving uploaded file.";
        }
    }
    else {
        echo "Error uploading profile picture.";
    }
}

?>