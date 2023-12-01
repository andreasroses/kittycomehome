<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Profile</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>

    <?php
    include 'php-scripts/config.php';

    // Get the cat name from the URL parameter
    $cat_id = isset($_GET['cat_id']) ? mysqli_real_escape_string($db_conn, $_GET['cat_id']) : '';

    // Fetch cat information based on the cat name
    $query = "SELECT * FROM fostercat WHERE cat_id = '$cat_id'";
    $result = $db_conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $isgoodwithcats = "No";
        $isgoodwithdogs = "No";
        $isgoodwithkids = "No";
        if($row['cat_isgoodwithcats'] == 1){
            $isgoodwithcats = "Yes";
        }
        if($row['cat_isgoodwithdogs'] == 1){
            $isgoodwithdogs = "Yes";
        }
        if($row['cat_isgoodwithkids'] == 1){
            $isgoodwithkids = "Yes";
        }
    } else {
        // Display a message if the cat profile is not found
        echo "<p>Cat profile not found.</p>";
    }
    ?>
    <div class="profile-container">
        <div class="left-column">
            <div class="cat-pfp-container">
                <img src="<?php echo $row['cat_img_src']?>">
            </div>
            <div class="cat-info-container">
                <div>
                    <h2 style="text-align: center;"><?php echo $row['cat_name'] ?></h2>
                    <p><strong>Gender: </strong> <?php echo $row['cat_gender'] ?></p>
                    <p><strong>Good with cats?: </strong><?php echo $isgoodwithcats ?></p>
                    <p><strong>Good with dogs?: </strong><?php echo $isgoodwithdogs ?></p>
                    <p><strong>Good with kids?: </strong><?php echo $isgoodwithkids ?></p>
                </div>
                <a href="./adoptionform.php" class="list-form-btn" style="float: none; text-align: center;">Apply to Adopt</a>
                <a href="./account.php?account_id=<?php echo $row['account_id']?>" class="list-form-btn" style="float: none; text-align: center; margin-top: 1em;">Owner Profile</a>
            </div>
        </div>
        <div class="right-column">
        <?php
        // Fetch cat information based on the cat name
        $query = "SELECT * FROM post WHERE cat_id = '$cat_id'";
        $result = $db_conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <a class="post-card" href="./post.php?post_id=<?php echo $row['post_id']?>">
                    <img class="postcard-img" src="<?php echo $row['post_imgsrc']?>">
                </a>
                <?php
            }
        } else {
            // Display a message if the cat profile is not found
            ?>
                <h1 style="font-family: 'Playpen Sans', fantasy; color: #3d3737; margin-left: 2em;">No posts yet!</h1>
            <?php
        }

        // Close the database connection
        $db_conn->close();
    ?>
        </div>
    </div>
    <footer></footer>
</body>

</html>
