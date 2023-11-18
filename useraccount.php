<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="stylesheets/style.css">

</head>

<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    </div>
    <div class="flex justify-content-center">
        <h1>My Account</h1>
        <div>
            <?php
            // Start the session
            session_start();

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
        // Start the session
        session_start();

        // Check if the session variable is set
            // Get the image path from the session variable
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            
            // Display the image using an <img> tag
            echo '<h4> Hi,' . $fname . ' ' . $lname . '</h4>';
?>

        </div>
    </div>