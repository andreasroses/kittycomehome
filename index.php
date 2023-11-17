<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example for KittycomeHome</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    
</head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
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
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/sad-cat.jpg" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>

            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/shades-cat.jpg" alt="A picture of a sad cat.">
                    <p>Cat Name</p>
                </div>
            </div>

            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/shades-cat.jpg" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>

            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/cool-cat.jpg" alt="A picture of a sad cat.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/wirecat.jpg" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/minion-cat.png" alt="A picture of a sad cat.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/angry-cat.png" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/sad-cat.jpg" alt="A picture of a sad cat.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/shades-cat.jpg" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>
            <div class="card-carousel">
                <div class="kitty-card-carousel">
                    <img src="./images/cool-cat.jpg" alt="A picture of a cat smoking.">
                    <p>Cat Name</p>
                </div>
            </div>
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