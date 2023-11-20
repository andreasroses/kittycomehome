<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/formStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
        </div>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <div class = "formBox">
            <form action="/php-scripts/signup.php" method="POST" enctype="multipart/form-data">
                <table class = "signupForm">
                    <tr>
                        <td colspan="2">
                            <h2>Sign Up</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                            <input class="special-width" type="text" id="fname" name="fname">
                        </td>
                        <td>
                            <label for="lname">Last Name</label>
                            <input class="special-width" type="text" id="lname" name="lname">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="email">Email:</label>
                            <input class="defaultWidth" type="text" id="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <label for="pwd">Password:</label>
                        <input class="defaultWidth" type="text" id="pwd" name="pwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="pwd">Confirm Password:</label>
                        <input class="defaultWidth" type="text" id="cpwd" name="cpwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="profPic">Profile Picture:</label>
                        <input type="file" name="profPic">
                    </td>
                </tr>
                <tr class="fixPadding">
                    <td colspan="2">
                        <div class="submit-button-container">
                            <input type="submit" value="Sign Up">
                        </div>
                    </td>
                </tr>
                </table>
            </form>
        </div>
    </div>

</body>
</html>