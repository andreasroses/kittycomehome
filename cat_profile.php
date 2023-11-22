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
        ?>
        <div class="cat-profile-container">
            <div class="cat-profile-inner">
                <img class="cat-pfp" src="<?php echo $row['cat_img_src']; ?>" alt="<?php echo $row['cat_name']; ?>">
                <h2 class="cat-name"><?php echo $row['cat_name']; ?></h2>
                <div style="margin-bottom: 1em;">
                    <p class="cat-info"><strong>Gender:</strong> <?php echo $row['cat_gender']; ?></p>
                    <p class="cat-info"><strong>Good with cats?</strong> <?php echo $isgoodwithcats ?></p>
                    <p class="cat-info"><strong>Good with dogs?</strong> <?php echo $isgoodwithdogs ?></p>
                    <p class="cat-info"><strong>Good with kids?</strong> <?php echo $isgoodwithkids ?></p>
                </div>
                <div>
                    <a class="list-form-btn" href="./cat-post-profile.php?cat_id=<?php echo $cat_id ?>">Go to Profile</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        // Display a message if the cat profile is not found
        echo "<p>Cat profile not found.</p>";
    }

    // Close the database connection
    $db_conn->close();
    ?>
    <footer></footer>
</body>

</html>
