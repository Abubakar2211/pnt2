<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $cellPhone = mysqli_real_escape_string($con, $_POST['cellPhone']);
    $cellNumber = mysqli_real_escape_string($con, $_POST['cellNumber']);
    $joining = mysqli_real_escape_string($con, $_POST['joining']);
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $contactStatus = mysqli_real_escape_string($con, $_POST['contactStatus']);
    $contactBoardcast = mysqli_real_escape_string($con, $_POST['contactBoardcast']);

    $query = "INSERT INTO contacts (name, email, contact, cellPhone, cellNumber, joining, companyName, contactStatus, contactBoardcast)
              VALUES ('$name', '$email', '$contact', '$cellPhone', '$cellNumber', '$joining', '$companyName', '$contactStatus', '$contactBoardcast')";

    if (mysqli_query($con, $query)) {
        echo "contact added successfully.";
    } else {
        echo "Error: " . mysqli_error($con); // Log or display error for debugging
    }
}
?>
