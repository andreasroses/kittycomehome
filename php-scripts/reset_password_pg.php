<?php
session_start();
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
                    <tr>
                        <td>
                            <label for="newPassword">New Password:</label>
                            <input class="form-control" type="password" id="newPassword" name="newPassword" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="confirmPassword">Confirm Password:</label>
                            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="submit-button-container">
                                <input class="list-form-btn" type="submit" value="Reset Password">
                            </div>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                <input type="hidden" name="securityQuestion" value="<?php echo $_POST['securityQuestion']; ?>">
                <input type="hidden" name="securityAnswer" value="<?php echo $_POST['securityAnswer']; ?>">
            </form>
        </div>
    </div>
    <footer class="footerabs"></footer>
</body>

</html>
