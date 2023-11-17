<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");
    // Insert user data into the database
    $sql = "INSERT INTO accounts (fname,lname,email, password) VALUES ('$fname','$lname','$email', '$pwd')";
    
    if ($db_conn->query($sql) === TRUE) {
        echo "User registered successfully!";
        // Fetch the user ID from the database
        $user_id = $db_conn->insert_id;

        // Set the user ID in the session
        $_SESSION['user_id'] = $user_id;

        // Redirect to a welcome page or any other desired page
        header("Location: welcome.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>