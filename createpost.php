<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Profile</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <div style="display: flex; justify-content: center;">
    <form class="create-post-container" action="./php-scripts/uploadpost.php" method="POST" enctype="multipart/form-data">
        <h2 style="text-align: center;">Create a New Post</h2>
        <label forHTML="cat">Which of your listed cats is shown in this post?</label>
        <select title="Choose a cat" name="cat" id="cat" class="form-control" style="width: 100%;" oninvalid="this.setCustomValidity('You must list a cat to create a post!')" required>
            <?php
                include 'php-scripts/config.php';
                $account_id = $_SESSION['user_id'];
                $query = "SELECT cat_id, cat_name FROM fostercat WHERE account_id = '$account_id'";
                $result = $db_conn->query($query);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php
                    }
                }
                $db_conn->close();
            ?>
        </select>
        <br/>
        <input title="Upload a photo" class="form-control" type="file" name="postimg" id="postimg" style="width: 95%;" required>
        <br/>
        <textarea title="Caption your photo" class="form-control" name="desc" id="desc" placeholder="Photo Description" style="width: 95%; resize: none;"></textarea>
        <button type="submit" class="list-form-btn">Post</button>
            </form>
    </div>
    <footer class="footerabs"></footer>
</body>
</html>