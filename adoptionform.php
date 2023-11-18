<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Adoption Form</title>
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
    <div class="adoption-form-container">
    <h2>Cat Adoption Fostering Form</h2>
    <form action="process_form.php" method="post">
        <h3>Applicant Information:</h3>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required>
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" name="phoneNumber" required>
        <br>
        <label for="email">Email Address:</label>
        <input type="email" name="email" required>
        <br>
        <h3>Living Situation:</h3>
        <label for="residenceType">Type of Residence:</label>
        <input type="text" name="residenceType" required>
        <br>
        <label for="ownOrRent">Own or Rent:</label>
        <input type="text" name="ownOrRent" required>
        <br>
        <label for="landlordPermission">Landlord's Permission (if renting):</label>
        <input type="radio" name="landlordPermission" value="Yes">Yes
        <input type="radio" name="landlordPermission" value="No">No
        <input type="radio" name="landlordPermission" value="N/A">N/A
        <br>
        <h3>Pet Ownership History:</h3>
        <label for="currentPets">Current Pets:</label>
        <input type="radio" name="currentPets" value="Yes">Yes
        <input type="radio" name="currentPets" value="No">No
        <br>
        <label for="numberOfPets">How many:</label>
        <input type="number" name="numberOfPets" min="0">
        <br>
        <label for="species">What species:</label>
        <input type="text" name="species">
        <br>
        <label for="vetPhoneNumber">Veterinary Phone Number:</label>
        <input type="tel" name="vetPhoneNumber">
        <br>
        <label for="knowledgeOfCatCare">Knowledge of Basic Cat Care:</label>
        <input type="radio" name="knowledgeOfCatCare" value="Yes">Yes
        <input type="radio" name="knowledgeOfCatCare" value="No">No
        <br>

        <h3>Applicant Signature:</h3>
        <label for="applicantSignature">Applicant Signature:</label>
        <input type="text" name="applicantSignature" required>

        <label for="date">Date:</label>
        <input type="date" name="date" required>
        <br>
        <input type="submit" value="Submit">
    </form>
    </div>

</body>
</html>
