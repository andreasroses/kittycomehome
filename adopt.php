<DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cat Gallery</title>
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

      <div class="header_img">
        <img src="./images/cat-paws-banner.jpeg" alt="A picture of a cute cat behind pink background.">
      </div>
      <div><button><a href="./images/adoption-form.pdf" class ="home-sub-header">Download Adoption Form</a></button></div>
      <!--testing -->
      <div class="gallery-container">
        <!-- Loops through cat names -->
        <?php
        // Include the database configuration
        include 'php-scripts/config.php';
        echo "Connected to the database successfully."; // debug
        // Query to fetch cat information from the database
        $query = "SELECT cat_name, cat_img_src FROM fostercat";
        $result = $mysqli->query($query);

        // Check if the query was successful
        if (!$result) {
            die("Error in query: " . $mysqli->error);
        }else {
            echo "Test query executed successfully.";
        }

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
            echo "<p>No cat cards available.</p>";
        }
        ?>
    </div>
      
      <div class="gallery-container">
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            <div class="card">
              <div class="kitty-card">
                  <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                  <p>Cat Name</p>
                </div>
            </div>
  
            
  
      </div>
  
      
  
  
  
      
  </body>
  </html>