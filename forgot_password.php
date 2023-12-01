<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("./php-scripts/config.php");

    $email = $_POST["email"];
    $sql = "SELECT security_questions_id, security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email'";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 3) {
        $_SESSION['tmpEmail'] = $email;
        header("Location: ./securityquestions.php");
        exit();
    }
    else{
        $error = "Security Questions not answered or email not found. Contact support.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            <form action="./forgot_password.php" method="POST">
                <table class="signupForm">
                    <tr>
                        <td colspan="2">
                            <h1>Forgot Password</h1>
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
                        <td colspan="2">
                            <label for="email">Email:</label>
                            <input class="form-control" style="width: 95%" type="text" id="email" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="submit-button-container">
                                <input class="list-form-btn" type="submit" value="Submit">
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
