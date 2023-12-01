<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("./php-scripts/config.php");
    $newPassword = $_POST["newPwd"];
    $confirmPassword = $_POST["confirmPwd"];
    $email = $_SESSION["tmpEmail"];
    $sql = "UPDATE accounts SET account_password='$newPassword' WHERE account_email='$email'";
    if ($newPassword == $confirmPassword) {
        if ($db_conn->query($sql) === TRUE) {
            unset($_SESSION["tmpEmail"]);
            $success = "Password Updated. Redirecting now...";
        } else {
            $error = "Unknown Error: Password failed to be updated";
        }
    } else {
        $error = "Passwords didn't match. Please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/formStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>

<body style="min-height: 100vh;">
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <div class="formBox">
            <form action="./reset_password.php" method="POST">
                <table class="signupForm">
                    <tr>
                        <td colspan="2">
                            <h1>Reset Password</h1>
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
                            <label for="newPwd">New Password:</label>
                            <input class="form-control" type="password" id="newPassword" name="newPwd" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="confirmPwd">Confirm Password:</label>
                            <input class="form-control" type="password" id="confirmPassword" name="confirmPwd" required>
                        </td>
                    </tr>
                    <?php
                    if (isset($success)) {
                        echo "<tr><td><p>$success</p></td>
                            </tr>";
                            echo "<script>
                            setTimeout(function() {
                            window.location.href = '../login.php';
                            }, 2000); // Redirect after 2 seconds
                            </script>";
                            exit();
                    }
                    ?>
                    <tr>
                        <td>
                            <div class="submit-button-container">
                                <input class="list-form-btn" type="submit" value="Reset Password">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <footer class="footerabs"></footer>
</body>

</html>