<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("./php-scripts/config.php");
    // get user data
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $sql = "SELECT * FROM accounts WHERE account_email = '$email'";
    $result = $db_conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, check the password
        $row = $result->fetch_assoc();
        if ($password == $row["account_password"]) {
            // Password is correct, log in the user
            $_SESSION['user_id'] = $row['account_id'];
            $_SESSION['fname'] = $row['account_fname'];
            $_SESSION['lname'] = $row['account_lname'];
            $_SESSION['pfpimg'] = $row['account_imgsrc'];
            if($row['account_id'] == 1){
                $_SESSION['isadmin'] = 1;
            }
            else{
                $_SESSION['isadmin'] = 0;
            }
            // Redirect to the user's account page
            header("Location: ../useraccount.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "User not found";
    }
}
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
            <form action="./login.php" method="POST" id="login-form">
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
                            <input class="form-control" type="password" id="pwd" name="pwd">
                            <h4><a href="forgot-password-pg.php">Forgot password?</a></h4><br>
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