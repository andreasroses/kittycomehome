<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>List a Cat</title>
      <link rel="stylesheet" href="stylesheets/style.css">
  </head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <div class="adoption-form-container">
        <h2>Foster Cat Information Form</h2>
        <form action="php-scripts/process_foster_cat_form.php" method="post">
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

</body>
</html>
