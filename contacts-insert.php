<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $types = mysqli_real_escape_string($con, $_POST['types']);
    $sub_types = mysqli_real_escape_string($con, $_POST['sub_types']);
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

    $statusQuery = "SELECT status FROM contacts_status WHERE applied = 'Applied' LIMIT 1";
    $statusResult = mysqli_query($con, $statusQuery);
    
    if (!$statusResult) {
        echo "Error: " . mysqli_error($con);
        exit;
    }

    $statusRow = mysqli_fetch_assoc($statusResult);

    if ($statusRow) {
        $status = $statusRow['status'];

        $query = "INSERT INTO contacts (type, sub_type, first_name, last_name, designation, email_id, cell_number, phone_number, company_name, category, sub_category, website, country, city, D_O_B, religion, facebook, status)
                  VALUES ('$types', '$sub_types', '$first_name', '$last_name', '$designation', '$email_id', '$cell_number', '$phone_number', '$company_name', '$category', '$sub_category', '$website', '$country_field', '$city', '$D_O_B', '$religion', '$facebook', '$status')";

        if (mysqli_query($con, $query)) {
            echo "Contact added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: No applied status found in the database.";
    }
}
?>
