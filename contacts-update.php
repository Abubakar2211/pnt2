<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = mysqli_real_escape_string($con, $_POST["id"]);
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

    $sql = "UPDATE contacts SET 
        first_name = '{$first_name}', 
        last_name = '{$last_name}', 
        cell_number = '{$cell_number}', 
        email_id = '{$email_id}', 
        phone_number = '{$phone_number}', 
        company_name = '{$company_name}', 
        designation = '{$designation}', 
        country = '{$country_field}',
        city = '{$city}', 
        religion = '{$religion}',
        D_O_B = '{$D_O_B}', 
        category = '{$category}', 
        sub_category = '{$sub_category}' 
        WHERE id = '{$contactId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;  // Success
    } else {
        echo 0;  // Error
    }
}
