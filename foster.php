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
    <?php echo'Before testing database connection';?>
    <div class="gallery-container">
        
        <!-- Loops through cat names -->
        <?php
        echo'About to test database connection';
        // Include the database configuration
        include 'php-scripts/config.php';
        echo "Connected to the database successfully."; // debug
        // Close the database connection
        $mysqli->close();
        ?>
    </div>
</body>
</html>