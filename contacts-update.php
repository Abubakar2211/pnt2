<?php
include "db.php";

// Handle form submission to update contact details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = mysqli_real_escape_string($con, $_POST["id"]);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $cell_number = mysqli_real_escape_string($con, $_POST['cell_number']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $sub_category = mysqli_real_escape_string($con, $_POST['sub_category']);
    $website = mysqli_real_escape_string($con, $_POST['website']);
    $country_field = mysqli_real_escape_string($con, $_POST['country']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $D_O_B = mysqli_real_escape_string($con, $_POST['D_O_B']);
    $religion = mysqli_real_escape_string($con, $_POST['religion']);
    $facebook = mysqli_real_escape_string($con, $_POST['facebook']);

    // SQL query to update contact information
    $sql = "UPDATE contacts SET 
        first_name = '{$first_name}', 
        last_name = '{$last_name}', 
        designation = '{$designation}', 
        email_id = '{$email_id}', 
        cell_number = '{$cell_number}', 
        phone_number = '{$phone_number}', 
        company_name = '{$company_name}', 
        category = '{$category}', 
        sub_category = '{$sub_category}', 
        website = '{$website}', 
        country = '{$country_field}',
        city = '{$city}', 
        D_O_B = '{$D_O_B}', 
        religion = '{$religion}',
        facebook = '{$facebook}'
        WHERE id = '{$contactId}'";

    // Execute the query and check for success or failure
    if (mysqli_query($con, $sql)) {
        echo 1;  // Success
    } else {
        echo 0;  // Error
    }
}
