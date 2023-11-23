<?php
session_start();
include 'config.php';


if(isset($_SESSION['user_id']) && $_SESSION['isadmin'] == 1){

    $post_id = isset($_GET['post_id']) ? mysqli_real_escape_string($db_conn, $_GET['post_id']) : '';
    $query = "DELETE FROM favorite WHERE post_id = '$post_id'";
    $result = $db_conn->query($query);
    if (!$result) {
        die("Error in query: " . $db_conn->error);
    } else {
        echo "Favorite deleted successfully!";
        $query = "DELETE FROM post WHERE post_id = '$post_id'";
        $result = $db_conn->query($query);
        if(!$result){
            die("Error in query: " . $db_conn->error);
        }
        else{
            echo "Post deleted successfully!";
        }
    }
    
    // Close the database connection
    $db_conn->close();
    header("Location: ../index.php");
}
else{
    echo "Access denied";
}