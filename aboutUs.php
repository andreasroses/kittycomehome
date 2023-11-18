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
    <div class="justify-content-center" >
        <img src="images/filler.jpg" id="about-img">
    </div>
    <div>
        <hr style="margin: 2em">
        <div class="flex">
            <div style="width:50%; margin-left: 2em; margin-right:1em;">
                <!-- left subheader -->
                <h3 class="text-block text-align-center">About Us</h3> 
                <!-- left text -->
                <p class="text-block">KittyComeHome is a blablabla Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </p>
            </div>
            <div style="width: 50%; margin-right: 2em; margin-left: 1em;">
                <!-- right subheader -->
                <h3 class="text-block text-align-center">Subheader</h3>
                <!-- right text -->
                <p class="text-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
            </div>
        </div>
    </div>
    
</body>
</html>