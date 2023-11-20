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
    $cat_name = isset($_GET['cat_name']) ? mysqli_real_escape_string($db_conn, $_GET['cat_name']) : '';

    // Fetch cat information based on the cat name
    $query = "SELECT * FROM fostercat WHERE cat_name = '$cat_name'";
    $result = $db_conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="cat-profile-container">
            <img src="<?php echo $row['cat_img_src']; ?>" alt="<?php echo $row['cat_name']; ?>">
            <h2><?php echo $row['cat_name']; ?></h2>
            <p><strong>Gender:</strong> <?php echo $row['cat_gender']; ?></p>
            <p><strong>Age:</strong> <?php echo $row['cat_age']; ?></p>
        </div>
        <?php
    } else {
        // Display a message if the cat profile is not found
        echo "<p>Cat profile not found.</p>";
    }

    // Close the database connection
    $db_conn->close();
    ?>
</body>

</html>
