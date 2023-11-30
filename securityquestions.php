<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/formStyle.css">
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
        <form action="./php-scripts/security_check.php" method="POST">
            <table class="loginForm">
                <tr>
                    <td>
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
                        <label for="security_answer1">What is your mother's maiden name?:</label>
                        <input class="form-control" name="security_answer1" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="security_answer2">What was the name of your favorite teacher?:</label>
                        <input class="form-control" name="security_answer2" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="security_answer3">What was your childhood phone number including area code? (e.g.,
                            000-000-0000):</label>
                        <input class="form-control" name="security_answer3" required><br>
                        <div class="submit-button-container">
                            <input class="list-form-btn" type="submit" value="Submit">
                        </div>
                    </td>
                </tr>
            </table>
            </form>
</body>

</html>