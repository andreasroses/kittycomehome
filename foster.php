<?php
// foster.php

include 'navbar.php';
?>
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
    <!--header image-->
    <div class="header_img">
        <img src="./images/cat-glare-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div><button><a href="./images/fostering-form.pdf" class ="home-sub-header">Download fostering Form</a></button></div>
    
    <div class="gallery-container">
        <!-- Loops through cat names -->
        <?php
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
        ?>
    </div>
</body>
</html>