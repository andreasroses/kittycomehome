<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/formStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>

<body style="min-height: 100vh;">
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <!-- <img id = "headerImg" src="https://i.pinimg.com/originals/12/84/a4/1284a4ee744be631e97a04d1934877d9.jpg" alt="cute cat landscape image"> -->
        <div class="formBox">
            <form action="/php-scripts/login.php" method="POST" id="login-form">
                <table class="loginForm">
                    <tr>
                        <td>
                            <h1>Login</h1>
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
                            <label for="email">Email:</label>
                            <input class="form-control" type="text" id="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pwd">Password:</label>
                            <input class="form-control" type="text" id="pwd" name="pwd">
                            <h4>Forgot password?</h4><br>
                            <div class="submit-button-container">
                                <input class="list-form-btn" type="submit" value="Login">
                            </div>
                        </td>
                    </tr>
                    <tr class="fixPadding">
                        <td>
                        <p>New to KittyComeHome? <a href="signup-pg.php">Sign Up</a></p>
                        </td>
                        </tr>
                </table>
            </form>
        </div>
    </div>
    <footer class="footerabs"></footer>
</body>

</html>