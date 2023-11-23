<?php
session_start();
include 'config.php';

$account_id = isset($_GET['account_id']) ? mysqli_real_escape_string($db_conn, $_GET['account_id']) : '';
if(isset($_SESSION['user_id']) && ($_SESSION['isadmin'] == 1 || $_SESSION['user_id'] == $account_id)){
    $query = "SELECT * from favorite WHERE account_id = '$account_id'";
    $result = $db_conn->query($query);
    if($result){
        $query = "SELECT post_id from post WHERE account_id = '$account_id'";
        $result = $db_conn->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $post_id = $row['post_id'];
                $query2 = "DELETE FROM favorite WHERE post_id = '$post_id'";
                $result2 = $db_conn->query($query2);
                if($result2){
                    $query2 = "DELETE FROM post WHERE post_id = '$post_id'";
                    $result2 = $db_conn->query($query2);
                    if(!$result2){
                        die("Error in query: " . $db_conn->error);
                    }
                }
                else{
                    die("Error in query: " . $db_conn->error);
                }
            }
        }
    }
    else{
        die("Error in query: " . $db_conn->error);
    }
    $query = "DELETE FROM fostercat WHERE account_id = '$account_id'";
    $result = $db_conn->query($query);
    if(!$result){
        die("Error in query: " . $db_conn->error);
    }
    else{
        $query = "DELETE FROM account WHERE account_id = '$account_id'";
        $result = $db_conn->query($query);
        if(!$result){
            die("Error in query: " . $db_conn->error);
        }
    }
    // Close the database connection
    $db_conn->close();
    header("Location: ../index.php");
}
else{
    echo "Access denied";
}