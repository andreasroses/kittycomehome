<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>List a Cat</title>
      <link rel="stylesheet" href="stylesheets/style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body style="min-height: 100vh;">
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <div class="adoption-form-container">
        <h2>Foster Cat Information Form</h2>
        <form action="php-scripts/process_listing_form.php" method="post">
            <!-- cat_name -->
            <label for="catName">Cat Name:</label>
            <input type="text" name="catName" required>
            <br>
            <!-- cat_gender -->
            <label for="catGender">Gender:</label>
            <select name="catGender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <!-- cat_isgoodwithcats -->
            <label for="catIsGoodWithCats">Is Good with Cats?</label>
            <input type="checkbox" name="catIsGoodWithCats">
            <br>
            <!-- cat_isgoodwithdogs -->
            <label for="catIsGoodWithDogs">Is Good with Dogs?</label>
            <input type="checkbox" name="catIsGoodWithDogs">
            <br>
            <!-- cat_isgoodwithkids -->
            <label for="catIsGoodWithKids">Is Good with Kids?</label>
            <input type="checkbox" name="catIsGoodWithKids">
            <br>
            <!-- cat_img_src -->
            <label for="catImg">Upload Image:</label>
            <input type="file" name="catImg" accept="image/*" required>
            <br>
            <!-- Submit button -->
            <input type="submit" value="Submit">
        </form>
    </div>
    <footer class="footerabs"></footer>
</body>
</html>
