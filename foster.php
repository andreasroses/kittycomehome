<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foster</title>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body style="background-image: url(''); background-repeat: repeat; background-size: 10%;">
    <div class="flex">
    <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <!--header image
    <div class="header_img">
        <img src="./images/cat-glare-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div><button><a href="./images/fostering-form.pdf" class ="home-sub-header">Download fostering Form</a></button></div>
    -->
    
    <div class="gallery-container">
        <!-- Loops through cat names -->
        <?php
        // Database configuration
        $db_host = 'kch-db.mysql.database.azure.com';
        $db_user = 'adminkch';
        $db_pass = 'kchpwd777!';
        $db_name = 'kittycomehomedb';

        // Create a connection
        $db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check the database connection
        if ($db_conn->connect_error) {
            die("Connection failed: " . $db_conn->connect_error);
        }

        // Query to fetch cat information from the database
        $query = "SELECT cat_name, cat_img_src FROM fostercat";
        $result = $db_conn->query($query);

        // Check if the query was successful
        if (!$result) {
            die("Error in query: " . $db_conn->error);
        }

        // Loop through cat names
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <div class="kitty-card">
                        <img src="<?php echo $row['cat_img_src']; ?>" alt="<?php echo $row['cat_name']; ?>">
                        <p><?php echo $row['cat_name']; ?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            // Display a message if there are no cat cards
            echo "<p>No cat cards available.</p>";
        }
        // Close the database connection
        $db_conn->close();
        ?>
    </div>
</body>
</html>