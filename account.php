<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
    $account_id = isset($_GET['account_id']) ? mysqli_real_escape_string($db_conn, $_GET['account_id']) : '';

    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $account_id){
        header("Location: ./useraccount.php");
    }
    // Fetch cat information based on the cat name
    $query = "SELECT * FROM accounts WHERE account_id = '$account_id'";
    $result = $db_conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Display a message if the cat profile is not found
        echo "<p>profile not found.</p>";
    }
    ?>
    <div class="profile-container">
        <div class="left-column">
            <div class="cat-pfp-container">
                <img src="<?php echo $row['account_imgsrc']?>">
            </div>
            <div class="cat-info-container">
                <div>
                    <h2 style="text-align: center;"><?php echo $row['account_fname']." ".$row['account_lname'] ?></h2>
                    <?php
                        if(isset($_SESSION['user_id']) && $_SESSION['isadmin'] == 1){
                            ?><a class="list-form-btn" style="float: none; text-align: center; width: 100%; display: inline-block;" href="./php-scripts/delete-account.php?account_id=<?php echo $row['account_id']; ?>">Delete</a><?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="right-column">
        <?php
        // Fetch cat information based on the cat name
        $query = "SELECT * FROM fostercat WHERE account_id = '$account_id'";
        $result = $db_conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <a class="post-card2" href="./cat_profile.php?cat_id=<?php echo $row['cat_id']?>">
                    <img src="<?php echo $row['cat_img_src']?>">
                    <p><?php echo $row['cat_name']; ?></p>
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
