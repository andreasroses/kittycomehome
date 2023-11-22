<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/userAcc.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    </div>
    <div class="maincontainer">
        <div class="userAcc-container">
            <h1>My Account</h1>
            <div>
                <?php
                // Check if the session variable is set
                if (isset($_SESSION['pfpimg'])) {
                    // Get the image path from the session variable
                    $imagePath = $_SESSION['pfpimg'];
                    
                    // Display the image using an <img> tag
                    echo '<img src="' . $imagePath . '" alt="Profile Picture">';
                }
                ?>
            </div>
            <div>
                <?php

            // Check if the session variable is set
                // Get the image path from the session variable
                $fname = $_SESSION['fname'];
                $lname = $_SESSION['lname'];
                
                // Display the image using an <img> tag
                echo '<h4> Hi,' . $fname . ' ' . $lname . '</h4>';
    ?>

            </div>
            <div>
                <a class="list-form-btn" href="./createpost.php?account_id='<?phpecho $_SESSION['user_id']?>'" style="float:none;">Create Post</a>
                <form action="/php-scripts/log-out.php" method="POST" style="margin-top:2em;">
                    <button type="submit" class="formButton">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>