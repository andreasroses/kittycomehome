<?php
session_start();
include 'config.php';

$cat_id = isset($_GET['cat_id']) ? mysqli_real_escape_string($db_conn, $_GET['cat_id']) : '';
$query = "SELECT account_id FROM fostercat WHERE cat_id = '$cat_id'";
$result = $db_conn->query($query);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $account_id = $row['account_id'];
    }
}
if(isset($_SESSION['user_id']) && ($_SESSION['isadmin'] == 1 || $_SESSION['user_id'] == $account_id)){
    
    $query = "DELETE FROM fostercat WHERE cat_id = '$cat_id'";
    $result = $db_conn->query($query);
    if($result){
        
    }
    else{
        die("Error in query: " . $db_conn->error);
    }
    
    $db_conn->close();
    header("Location: ../index.php");
}
