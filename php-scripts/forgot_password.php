<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config.php");

    $email = $_POST["email"];
    $sql = "SELECT security_questions_id, security_answer FROM accounts JOIN account_security USING(account_ID) WHERE account_email = '$email'";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $securityQuestion = $row['security_questions_id'];
        $storedAnswer = $row['security_answer'];

        // Check if the security question and answer are set
        if ($securityQuestion !== null && $storedAnswer !== null) {
            // Display the security question
            echo "<p>Security Question: " . getSecurityQuestion($securityQuestion, $db_conn) . "</p>";

            // Allow the user to input the answer
            echo '<form action="./reset_password.php" method="POST">';
            echo '<input type="hidden" name="email" value="' . $email . '">';
            echo '<input type="hidden" name="securityQuestion" value="' . $securityQuestion . '">';
            echo '<label for="securityAnswer">Answer:</label>';
            echo '<input type="text" id="securityAnswer" name="securityAnswer" required>';
            echo '<input type="submit" value="Submit">';
            echo '</form>';
        } else {
            echo "<p>Security question not set for this account. Please contact support.</p>";
        }
    } else {
        echo "<p>User not found.</p>";
    }
}

function getSecurityQuestion($questionId, $db_conn) {
    $questionId = intval($questionId);  // Ensure that $questionId is an integer to prevent SQL injection

    $sql = "SELECT security_question FROM security_questions WHERE security_question_id = $questionId";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row['security_question_text'];
    } else {
        return "Security question not found";
    }
}
?>
