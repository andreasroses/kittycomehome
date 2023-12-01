<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KittyComeHome</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <!--header image-->
    <div class="header_img">
        <img src="./images/cat-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div class="justify-content-center"><a href="foster.php" class="home-sub-header">Available For Fostering/Adopting</a></div>
    <!--Kitty carousel gallery-->
    <div class="gallery-container-carousel">
        <!--prev button-->
        <div>
            <button class="prev-btn">&larr;</button>
        </div>
          <!--next button-->
        <div>
            <button class="next-btn">&rarr;</button>
        </div>
        <!--kitty cards-->
            <?php
        // Include the database configuration
        include 'php-scripts/config.php';
        // Default query to fetch all cat information
        $query = "SELECT cat_id, cat_name, cat_img_src FROM fostercat";
        $result = $db_conn->query($query);
        // Loop through cat names
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
        <div class="card-container-carousel">
            <div class="card-carousel">
                <a href="cat_profile.php?cat_id=<?php echo urlencode($row['cat_id']); ?>" class="kitty-card-carousel">
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
    </div>
    <!--javascript for carousel-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cardContainer = document.querySelector(".card-container-carousel");
            const cards = document.querySelectorAll(".card-carousel");
    
            let currentIndex = 0;
    
            function showCard(index) {
                const cardWidth = cards[0].offsetWidth;
                currentIndex = index;
                cardContainer.style.transition = "transform 0.5s ease-in-out";
                cardContainer.style.transform = `translateX(${-index * cardWidth}px)`;
            }
    
            function nextCards() {
                currentIndex = (currentIndex + 4) % cards.length;
                showCard(currentIndex);
            }
    
            function prevCards() {
                currentIndex = (currentIndex - 4 + cards.length) % cards.length;
                showCard(currentIndex);
            }
    
            document.querySelector(".prev-btn").addEventListener("click", prevCards);
            document.querySelector(".next-btn").addEventListener("click", nextCards);
    
            // Initial display
            showCard(currentIndex);
        });
    </script>
</body>
<footer></footer>
</html>