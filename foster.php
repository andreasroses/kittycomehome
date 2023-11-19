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
        <img src="./images/cat-paws-banner" alt="A picture of cute cat paws behind pink background.">
    </div>
    <!-- Search form -->
    <div class="search-container">
            <form method="GET" action="">
            <select name="searchBy" id="searchByDropdown"class="search-dropdown">
                <option value="cat_Male">Male</option>
                <option value="cat_Female">Female</option>
                <option value="cat_isgoodwithcats">Good with Cats</option>
                <option value="cat_isgoodwithdogs">Good with Dogs</option>
                <option value="cat_isgoodwithkids">Good with Kids</option>
            </select>
        <button type="submit">Search</button>
        <button><a href="./images/adoption-form.pdf">Download Adoption Form</a></button>
            </form>
    </div>
    
    <div class="gallery-container">
        <!-- Loops through cat names -->
        <?php
        // Include the database configuration
        include 'php-scripts/config.php';

        // Check if a search query is submitted
    if (isset($_GET['searchBy'])) {
    $searchBy = mysqli_real_escape_string($db_conn, $_GET['searchBy']);
        switch ($searchBy) {
            case 'cat_isgoodwithcats':
            case 'cat_isgoodwithdogs':
            case 'cat_isgoodwithkids':
                $query = "SELECT cat_name, cat_img_src FROM fostercat WHERE $searchBy = 1";
                break;
            case 'cat_Male':
                $query = "SELECT cat_name, cat_img_src FROM fostercat WHERE $searchBy IN ('Male')";
                break;
            case 'cat_Female':
                $query = "SELECT cat_name, cat_img_src FROM fostercat WHERE $searchBy IN ('Female')";
                break;
            default:
                $query = "SELECT cat_name, cat_img_src FROM fostercat ORDER BY $searchBy";
                break;
        }
    } else {
        // Default query to fetch all cat information
        $query = "SELECT cat_name, cat_img_src FROM fostercat";
    }
        $result = $db_conn->query($query);

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
            echo "<p>No matching cat cards available.</p>";
        }
        // Close the database connection
        $db_conn->close();
        ?>
    </div>
</body>

</html>