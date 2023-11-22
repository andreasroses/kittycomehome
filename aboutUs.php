<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aboutUs</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    
<!-- header image -->
<div>
    <img src="images/cute-abyssinian-kittens-website-header.jpg" id="about-img">
</div>
<div>
    <hr style="margin: 2em">
    <div style="display: flex;">
        <div style="width:50%; margin-left: 2em; margin-right:1em;">
            <!-- left subheader -->
            <h3 class="text-block text-align-center">Welcome to Kitty Come Home!</h3>
            <!-- left text -->
            <p class="text-block">At Kitty Come Home, we believe in the transformative power of feline companionship
                and the incredible impact it can have on our lives. Our mission is to bring together a community of
                compassionate individuals who share a common love for cats, creating a space where fostering and adoption
                become not just actions, but heartfelt connections.

                <strong>Who We Are:</strong>
                Kitty Come Home isn't just a website; it's a vibrant community dedicated to the well-being of our feline friends.
                Whether you're a seasoned cat enthusiast, a first-time pet parent, or someone looking to make a positive impact in
                a cat's life, you've found your online home.<br/>

                <strong>What We Do:</strong>
                Our platform serves as a bridge between loving foster homes and cats in need of a temporary haven or a forever family.
                We connect foster parents with individuals eager to provide a loving home, fostering an environment of care, compassion, and responsible pet ownership.
            </p>

        </div>
        <div style="width: 50%; margin-right: 2em; margin-left: 1em;">
            <!-- right subheader -->
            <h3 class="text-block text-align-center">Why Choose Kitty Come Home:</h3>
            <!-- right text -->
            <ul class="text-block">
                <li><strong>Community:</strong> Join a community of cat lovers who share your passion for feline companionship. Connect,
                    share stories, and find support from like-minded individuals who understand the joy and responsibility that comes with being a cat parent.
                </li><br/>
                <li><strong>Fostering Opportunities:</strong> Make a difference in a cat's life by becoming a foster parent. Whether you're providing temporary care or considering
                    adoption, your contribution matters, and we're here to guide you every step of the way.
                </li><br/>
                <li><strong>Adoption Made Easy:</strong> Finding your purr-fect match has never been easier. Browse through our database of adorable cats searching for their
                    forever homes. Our adoption process is designed to ensure the well-being of both the cats and their new families.
                </li>
            </ul>

        </div>
    </div>
    <hr/>
    <!-- "Join Us in Making a Difference" centered under both sections -->
    <div style="text-align: center;">
        <h3 class="text-block">Join Us in Making a Difference:</h3>
        <p class="text-block">Kitty Come Home is more than a website; it's a movement. Together, we can create a world where every cat has a loving home and where the joy of feline companionship knows no bounds. Join us on this journey of compassion, connection, and the shared love for our feline friends.</p>
    </div>
<div style="text-align: center;">
    <p class="text-block">Thank you for being a part of the Kitty Come Home family!</p>
</div>
<footer></footer>
</body>
</html>