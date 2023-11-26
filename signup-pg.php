<?php
    session_start();
?>
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
<body style="min-height: 100vh;">
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
        </div>
    </div>
    <!--header image-->
    <div class="flex maincontainer">
        <div class = "formBox">
            <form action="./php-scripts/signup.php" method="POST" enctype="multipart/form-data">
                <table class = "signupForm">
                    <tr>
                        <td colspan="2">
                            <h1>Sign Up</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fname">First Name</label>
                            <input class="form-control" type="text" id="fname" name="fname">
                        </td>
                        <td>
                            <label for="lname">Last Name</label>
                            <input class="form-control" type="text" id="lname" name="lname">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="email">Email:</label>
                            <input class="form-control" style="width:95%" type="text" id="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label for="pwd">Password:</label>
                        <input class="form-control" type="password" id="pwd" name="pwd">
                    </td>
                    <td>
                        <label for="pwd">Confirm Password:</label>
                        <input class="form-control" type="password" id="cpwd" name="cpwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="profPic">Profile Picture:</label>
                        <input class="form-control" style="width:95%;" type="file" name="profPic">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="security_question">Security Question:</label>
                        <select name="security_question" required>
                            <option value="100">What is your mother's maiden name?</option>
                            <option value="101">What was the name of your favorite teacher?</option>
                            <option value="102">What was your childhood phone number including area code? (e.g., 000-000-0000)</option>
                        </select>
                    </td>
                    <td>
                        <label for="security_question">Security Question:</label>
                        <select name="security_question" required>
                            <option value="100">What is your mother's maiden name?</option>
                            <option value="101">What was the name of your favorite teacher?</option>
                            <option value="102">What was your childhood phone number including area code? (e.g., 000-000-0000)</option>
                        </select>
                    </td>
                                        <td>
                        <label for="security_question">Security Question:</label>
                        <select name="security_question" required>
                            <option value="100">What is your mother's maiden name?</option>
                            <option value="101">What was the name of your favorite teacher?</option>
                            <option value="102">What was your childhood phone number including area code? (e.g., 000-000-0000)</option>
                        </select>
                    </td>
                    <td>
                        <label for="security_answer">Security Answer:</label>
                        <input class="form-control" type="text" name="security_answer" required>
                    </td>
                </tr>
                <tr class="fixPadding">
                    <td colspan="2">
                        <div class="submit-button-container">
                            <input class="list-form-btn" type="submit" value="Sign Up">
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