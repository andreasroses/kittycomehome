<?php
// Include the database configuration
include 'php-scripts/config.php';

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$residenceType = $_POST['residenceType'];
$ownOrRent = $_POST['ownOrRent'];
$landlordPermission = isset($_POST['landlordPermission']) ? $_POST['landlordPermission'] : 'N/A';
$currentPets = isset($_POST['currentPets']) ? $_POST['currentPets'] : 'No';
$numberOfPets = isset($_POST['numberOfPets']) ? $_POST['numberOfPets'] : 0;
$species = isset($_POST['species']) ? $_POST['species'] : '';
$vetPhoneNumber = isset($_POST['vetPhoneNumber']) ? $_POST['vetPhoneNumber'] : '';
$knowledgeOfCatCare = isset($_POST['knowledgeOfCatCare']) ? $_POST['knowledgeOfCatCare'] : 'No';
$applicantSignature = $_POST['applicantSignature'];
$date = $_POST['date'];

// Insert data into the 'adoptionform' table
$query = "INSERT INTO adoptionform 
          (first_name, last_name, address, phone_number, email, residence_type, own_or_rent, landlord_permission, 
          current_pets, number_of_pets, species, vet_phone_number, knowledge_of_cat_care, applicant_signature, date)
          VALUES 
          ('$firstName', '$lastName', '$address', '$phoneNumber', '$email', '$residenceType', '$ownOrRent', '$landlordPermission', 
          '$currentPets', $numberOfPets, '$species', '$vetPhoneNumber', '$knowledgeOfCatCare', '$applicantSignature', '$date')";

$result = $mysqli->query($query);

if (!$result) {
    die("Error in query: " . $mysqli->error);
} else {
    echo "Adoption form submitted successfully!";
}

// Close the database connection
$mysqli->close();
?>
