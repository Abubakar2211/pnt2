<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $sellPhone = mysqli_real_escape_string($con, $_POST['sellPhone']);
    $sellNumber = mysqli_real_escape_string($con, $_POST['sellNumber']);
    $joining = mysqli_real_escape_string($con, $_POST['joining']);
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $clientStatus = mysqli_real_escape_string($con, $_POST['clientStatus']);
    $clientBoardcast = mysqli_real_escape_string($con, $_POST['clientBoardcast']);

    $query = "INSERT INTO clients (name, email, contact, sellPhone, sellNumber, joining, companyName, clientStatus, clientBoardcast)
              VALUES ('$name', '$email', '$contact', '$sellPhone', '$sellNumber', '$joining', '$companyName', '$clientStatus', '$clientBoardcast')";

    if (mysqli_query($con, $query)) {
        echo "Client added successfully.";
    } else {
        echo "Error: " . mysqli_error($con); // Log or display error for debugging
    }
}
?>
