<?php
// signup.php

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    
</head>
<body>
    <div class="flex">
        <?php include 'navbar.php'; ?>
        </div>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <div class = "formBox">
            <form action="signup.php" method="POST">
                <table class = "loginForm">
                    <tr>
                        <td colspan="2">
                            <h2>Sign Up</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                            <input class = "special-width" type="text" id="fname" name="fname">
                        </td>
                        <td>
                            <label for="lname">Last Name</label>
                            <input class = "special-width" type="text" id="lname" name="lname">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="email">Email:</label>
                            <input class = "defaultWidth" type="text" id="email" name="email"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <label for="pwd">Password:</label>
                        <input class = "defaultWidth" type="text" id="pwd" name="pwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="pwd">Confirm Password:</label>
                        <input class = "defaultWidth" type="text" id="cpwd" name="cpwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="submit-button-container">
                            <input type="submit" value="Login">
                        </div>
                    </td>
                </tr>
                </table>
            </form>
        </div>
    </div>

    <!-- <div class = "formBox">
        <form action="" method="get" id="login-form">
            <table class = "loginForm">
                <tr>
                    <td>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email"><br>
                    </td>
                    <td>
                        <label for="pwd">Password:</label><br>
                        <input type="text" id="pwd" name="pwd"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div> -->

</body>
</html>