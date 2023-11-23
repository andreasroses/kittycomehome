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
    <div class="post-page">
    <?php
        include 'php-scripts/config.php';
    // Get the cat name from the URL parameter
    $post_id = isset($_GET['post_id']) ? mysqli_real_escape_string($db_conn, $_GET['post_id']) : '';
    $query = "SELECT * FROM post WHERE post_id = '$post_id'";
    $result = $db_conn->query($query);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $accountid = $row['account_id'];
        }
    }

    $query = "SELECT account_fname FROM accounts WHERE account_id = '$accountid'";
    $result = $db_conn->query($query);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $accountname = $row['account_fname'];
        }
    }

    // Fetch cat information based on the cat name
    $query = "SELECT * FROM post WHERE post_id = '$post_id'";
    $result = $db_conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="post-container">
                <img src="<?php echo $row['post_imgsrc']?>">
                 <p><a><strong><?php echo $accountname;?>: </strong></a> <?php echo $row['post_desc'];?></p>
                 <?php
                        if(isset($_SESSION['user_id']) && $_SESSION['isadmin'] == 1){
                            ?><a class="list-form-btn" href="./php-scripts/delete-post.php?post_id=<?php echo $row['post_id']; ?>">Delete</a><?php
                        }
                    ?>
            </div>
            <?php
            
        }
    }
    else {
        // Display a message if there are no cat cards
        echo "<p>No matching posts available.</p>";
    }
    // Close the database connection
    $db_conn->close();
    ?>
    </div>
    <footer></footer>
</body>

</html>