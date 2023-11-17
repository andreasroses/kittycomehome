<?php
$servername = "kch-db.mysql.database.azure.com";
$username = "adminkch";
$password = "kchpwd777!";
$dbname = "kittycomehomedb"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, photo_url FROM foster_cats";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="kitty-card">';
        echo '<img src="' . $row['photo_url'] . '" alt="' . $row['name'] . '">';
        echo '<p>' . $row['name'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>