<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example for KittycomeHome</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    
</head>
<body style="background-image: url(''); background-repeat: repeat; background-size: 10%;">
    <div class="flex">
        <!--navigation bar-->
            <nav id="nav-bar">
            <ul> 
                <li class="dropdown">
                    <a class="dropdown-link" href="index.php">KittyComeHome</a>
                    <ul class="dropdown-content">
                        <li><a href="resources.html">Resources</a></li>
                        <li><a href="aboutUs.html">About Us</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="account.html" class="nav-link-end">Sign-up/Login</a></li>
                <div class="vl"></div>
                <li><a href="favorites.html" class="nav-link">Favorites</a></li>
                <li><a href="listCat.html" class="nav-link">List a cat</a></li>
                <li><a href="adopt.html" class="nav-link">Adopt</a></li>
                <li><a href="foster.php" class="nav-link">Foster</a></li>
            </nav>
    </div>
    <!--header image-->
    <div class="header_img">
        <img src="./images/cat-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div><button><a href="foster.php" class ="home-sub-header">Available For Fostering</a></button></div>
    <!--Kitty carousel gallery-->
    <div class="gallery-container-carousel">
        <!--prev button-->
        <div>
            <button class="prev-btn">&larr;</button>
        </div>
        <!--kitty cards-->
        <div class="card-container-carousel">
        <?php include 'fostercats.php'; ?>
        <?php foreach ($fostercat as $fostercat): ?>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="<?php echo $fostercat['img_src']; ?>" alt="A picture of <?php echo $fostercat['name']; ?>">
                    <p><?php echo $fostercat['name']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <!--next button-->
            <div>
                <button class="next-btn">&rarr;</button>
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
</html>