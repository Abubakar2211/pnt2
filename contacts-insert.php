<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $cell_number = mysqli_real_escape_string($con, $_POST['cell_number']);
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $country_field = mysqli_real_escape_string($con, $_POST['country']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $religion = mysqli_real_escape_string($con, $_POST['religion']);
    $D_O_B = mysqli_real_escape_string($con, $_POST['D_O_B']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $sub_category = mysqli_real_escape_string($con, $_POST['sub_category']);

    $query = "INSERT INTO contacts (first_name, last_name, cell_number, email_id, phone_number, company_name, designation, country, city, religion, D_O_B, category, sub_category)
              VALUES ('$first_name', '$last_name', '$cell_number', '$email_id', '$phone_number', '$company_name', '$designation', '$country_field', '$city', '$religion','$D_O_B','$category','$sub_category')";

    if (mysqli_query($con, $query)) {
        echo "contact added successfully.";
    } else {
        echo "Error: " . mysqli_error($con); // Log or display error for debugging
    }
}
?>
