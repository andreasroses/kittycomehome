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
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <!-- <img id = "headerImg" src="https://i.pinimg.com/originals/12/84/a4/1284a4ee744be631e97a04d1934877d9.jpg" alt="cute cat landscape image"> -->
        <div class="formBox">
            <form action="login.php" method="POST" id="login-form">
                <table class="loginForm">
                    <tr>
                        <td>
                            <h2>Login</h2>
                        </td>
                    </tr>
                    <?php
                        // Display any login error
                        if (isset($error)) {
                            echo "<tr><td><p>$error</p></td>
                            </tr>";
                        }
                        ?>
                    <tr>
                        <td>
                            <label for="email">Email:</label><br>
                            <input type="text" id="email" name="email"><br>
                        </td>
                    </tr>
                    <tr class="fixPadding">
                        <td>
                            <label for="pwd">Password:</label><br>
                            <input type="text" id="pwd" name="pwd">
                            <h4>Forgot password?</h4>
                            <div class="submit-button-container">
                                <input type="submit" value="Login">
                            </div>
                        </td>
                    </tr>
                    <h3>New to KittyComeHome?</h4>
                        <div class="submit-button-container">
                            <button class="formButton">Sign Up</button>
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