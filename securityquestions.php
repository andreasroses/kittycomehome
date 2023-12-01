<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("./php-scripts/config.php");

    $email = $_SESSION["tmpEmail"];
    // $securityQuestion = $_POST["securityQuestion"];
    $userAnswer1 = $_POST["security_answer1"];
    $userAnswer2 = $_POST["security_answer2"];
    $userAnswer3 = $_POST["security_answer3"];

    // Validate the user's answer to the security question
    if (validateSecurityAnswer($email, $userAnswer1, $userAnswer2, $userAnswer3, $db_conn)) {
        // Update the user's password
        header("Location: ./reset_password.php");
        exit();
    } else {
        $error = "Incorrect answer to 1 or more security questions. Please try again.";
    }
}

function validateSecurityAnswer($email, $uA1, $uA2, $uA3, $dbconn)
{
    $count = 0;
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 100";
    $result = $dbconn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA1) {
            $count++;
        }
    }
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 101";
    $result = $dbconn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA2) {
            $count++;
        }
    }
    $sql = "SELECT security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email' AND security_questions_id = 102";
    $result = $dbconn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["security_answer"] == $uA3) {
            $count++;
        }
    }
    if ($count == 3) {
        return true;
    }
    return false;
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
    <div class="flex maincontainer">
        <div class="formBox">
            <form action="./securityquestions.php" method="POST">
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
                            <input class="form-control secInputs" name="security_answer1" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="security_answer2">What was the name of your favorite teacher?:</label>
                            <input class="form-control secInputs" name="security_answer2" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="security_answer3">What was your childhood phone number including area code?
                                (e.g.,
                                000-000-0000):</label>
                            <input class="form-control secInputs" name="security_answer3" required><br>
                            <div class="submit-button-container">
                                <input class="list-form-btn" type="submit" value="Submit">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>