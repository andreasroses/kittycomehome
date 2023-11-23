<?php
    session_start();
?>
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
    <form action="./php-scripts/process_adoption_form.php" method="post">
        <h3>Applicant Information:</h3>
        <div style="display: inline-block; width: 49%;">
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" name="firstName" required>
        </div>
        <div style="display: inline-block; width: 49%;">
            <label for="lastName">Last Name:</label>
            <input class="form-control" type="text" name="lastName" required>
        </div>
        <div style="display: inline-block; width: 49%">
            <label for="phoneNumber">Phone Number:</label>
            <input class="form-control" type="tel" name="phoneNumber" required>
        </div>
        <div style="display: inline-block; width: 49%;">
            <label for="email">Email Address:</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <label for="address">Address:</label>
        <input class="form-control" style="width:95%" type="text" name="address" required>
        <h3>Living Situation:</h3>
        <label for="residenceType">Type of Residence:</label>
        <input class="form-control" type="text" name="residenceType" required>
        <label for="ownOrRent">Own or Rent:</label>
        <input class="form-control" type="text" name="ownOrRent" required>
        <label for="landlordPermission">Landlord's Permission (if renting):</label>
        <input type="radio" name="landlordPermission" value="Yes">Yes
        <input type="radio" name="landlordPermission" value="No">No
        <input type="radio" name="landlordPermission" value="N/A">N/A
        <br>
        <h3>Pet Ownership History:</h3>
        <label for="currentPets">Current Pets:</label>
        <input type="radio" name="currentPets" value="Yes">Yes
        <input  type="radio" name="currentPets" value="No">No
        <br/>
        <label for="numberOfPets">How many:</label>
        <input class="form-control" type="number" name="numberOfPets" min="0">
        <label for="species">What species:</label>
        <input class="form-control" type="text" name="species">
        <label for="vetPhoneNumber">Veterinary Phone Number:</label>
        <input class="form-control" type="tel" name="vetPhoneNumber">
        <label for="knowledgeOfCatCare">Knowledge of Basic Cat Care:</label>
        <input  type="radio" name="knowledgeOfCatCare" value="Yes">Yes
        <input type="radio" name="knowledgeOfCatCare" value="No">No
        <br>

        <h3>Applicant Signature:</h3>
        <label for="applicantSignature">Applicant Signature:</label>
        <input class="form-control" type="text" name="applicantSignature" required>

        <label for="date">Date:</label>
        <input class="form-control"type="date" name="date" required>
        <br>
        <input type="submit" class="list-form-btn" value="Submit">
    </form>
    </div>
    <footer></footer>
</body>
</html>
