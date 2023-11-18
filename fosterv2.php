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
        <?php include 'php-scripts/navbar.php';
        include 'php-scripts/config.php';
        ?>
    </div>
    <div class="header_img">
        <img src="./images/cat-glare-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div><button><a href="./images/fostering-form.pdf" class="home-sub-header">Download fostering Form</a></button>
    </div>
    <div class="gallery-container">
        <?php
            $select_prod="SELECT * from fostercat";
            $result_prod=mysqli_query($mysqli,$select_prod);
            while($row_data=mysqli_fetch_assoc($result_prod)){
            $cat_name=$row_data['cat_name'];
            $cat_img=$row_data['cat_img_src'];
            echo '<div class="kitty-card">';
            echo '<img src= "$cat_img" alt="$cat_name">';
            echo "<h4>$cat_name</h4>";
            echo "</div>";
            }
        ?>

    </div>
</body>

</html>