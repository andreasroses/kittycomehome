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
        <!--navigation bar-->
            <nav id="nav-bar">
            <ul> 
                <li class="dropdown">
                    <a class="dropdown-link" href="index.html">KittyComeHome</a>
                    <ul class="dropdown-content">
                        <li><a href="resources.html">Resources</a></li>
                        <li><a href="aboutUs.html">About Us</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="login.html" class="nav-link-end">Sign-up/Login</a></li>
                <div class="vl"></div>
                <li><a href="favorites.html" class="nav-link">Favorites</a></li>
                <li><a href="listCat.html" class="nav-link">List a cat</a></li>
                <li><a href="adopt.html" class="nav-link">Adopt</a></li>
                <li><a href="foster.html" class="nav-link">Foster</a></li>
            </nav>
    </div>
    <!--header image-->
    <div class="header_img">
        <img src="./images/cat-glare-banner.jpeg" alt="A picture of a cute cat behind pink background.">
    </div>
    <div><button><a href="./images/fostering-form.pdf" class ="home-sub-header">Download fostering Form</a></button></div>
    
    <div class="gallery-container">
        <?php include 'GetFosterCats.php'; ?>
    </div>
</body>
</html>