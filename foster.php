<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foster</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var selectedValue = "<?php echo isset($_GET['searchBy']) ? $_GET['searchBy'] : 'cat_Male'; ?>";
            $("#searchByDropdown").val(selectedValue);
        });
    </script>
</head>

<body style="overflow-x: hidden">
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <!--header image-->
    <div class="header_img">
        <img src="./images/cat-paws-banner.jpeg" alt="A picture of cute cat paws behind pink background.">
    </div>
    <!-- Search form -->
    <div class="search-container">
            <form method="GET" action="">
            <!-- Toggle input for favorited objects -->
            <label for="favoritedOnly">Favorites</label>
            <input type="checkbox" id="favoritedOnly" name="favoritedOnly">
            <select name="searchBy" id="searchByDropdown"class="search-dropdown">
                <option value="cat_Male">Male</option>
                <option value="cat_Female">Female</option>
                <option value="cat_isgoodwithcats">Good with Cats</option>
                <option value="cat_isgoodwithdogs">Good with Dogs</option>
                <option value="cat_isgoodwithkids">Good with Kids</option>
            </select>
            

        <button type="submit">Search</button>
        <button><a href="./images/adoption-form.pdf">Download Adoption/Foster Form</a></button>
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
    // Check if the "Favorites" toggle is checked
    $favoritedOnly = isset($_GET['favoritedOnly']) && $_GET['favoritedOnly'] == 'on';
    // Get the user's ID from the session
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        switch ($searchBy) {
            case 'cat_isgoodwithcats':
            case 'cat_isgoodwithdogs':
            case 'cat_isgoodwithkids':
                $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat WHERE $searchBy = 1";
                break;
            case 'cat_Male':
                $searchBy = 'Male';
                $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat WHERE cat_gender = 'Male'";
                break;
            case 'cat_Female':
                $searchBy = 'Female';
                $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat WHERE cat_gender = 'Female'";
                break;
            default:
                $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat";
                // If "Favorites" toggle is checked and a user is logged in, filter by favorited cats
                if ($favoritedOnly && $userId) {
                    $query .= " WHERE cat_id IN (SELECT cat_id FROM favorite WHERE account_id = $userId)";
                }
                
                $query .= " ORDER BY $searchBy";
                break;
        }
    } else {
        // Default query to fetch all cat information
        // If "Favorites" toggle is checked and a user is logged in, filter by favorited cats
        if ($favoritedOnly && $userId) {
            $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat WHERE cat_id IN (SELECT cat_id FROM favorite WHERE account_id = $userId)";
        } else {
            $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat";
        }
    }
        $result = $db_conn->query($query);

        // Loop through cat names
        //when user clicks on a cat it should lead to their cat profile
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
        
        <div class="card">
            <a href="cat_profile.php?cat_id=<?php echo urlencode($row['cat_id']); ?>" class="kitty-card">
                <img src="<?php echo $row['cat_img_src']; ?>" alt="<?php echo $row['cat_name']; ?>">
                <p><?php echo $row['cat_name']; ?></p>
            </a>
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
    <footer></footer>
    
</body>

</html>