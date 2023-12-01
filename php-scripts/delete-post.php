<?php
session_start();
include 'config.php';

$post_id = isset($_GET['post_id']) ? mysqli_real_escape_string($db_conn, $_GET['post_id']) : '';
$query = "SELECT account_id FROM post WHERE post_id = '$post_id'";
$result = $db_conn->query($query);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $account_id = $row['account_id'];
    }
}
if(isset($_SESSION['user_id']) && ($_SESSION['isadmin'] == 1 || $_SESSION['user_id'] == $account_id)){
    //this doesnt work it returns some garbage value as $cat_id and i have no idea why
    $query = "DELETE FROM post WHERE post_id = '$post_id'";
        $result = $db_conn->query($query);
        if(!$result){
            die("Error in query: " . $db_conn->error);
        }
        else{
            echo "Post deleted successfully!";
        }
    
    // Close the database connection
    $db_conn->close();
    header("Location: ../index.php");
}
else{
    echo "Access denied";
}