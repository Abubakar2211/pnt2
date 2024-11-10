<?php
include "db.php";
$contactId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM contacts WHERE id = $contactId";
$query = mysqli_query($con, $sql) or die("SQL Query Failed: " . mysqli_error($con));
$output = "";

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $output .= "<form id='update-form'>
        <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Update User Detail</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <label for='first_name' class='form-label'>First Name:</label>
            <input type='text' class='form-control' id='first_name' placeholder='Enter first name'  value='{$row['first_name']}' name='first_name'>
            <label for='last_name' class='form-label'>Last Name:</label>
            <input type='text' class='form-control' id='last_name' placeholder='Enter last name'  value='{$row['last_name']}' name='last_name'>
            <label for='cell_number' class='form-label'>Cell Number</label>
            <input type='Number' class='form-control' id='cell_number' placeholder='Enter cell number' value='{$row['cell_number']}' name='cell_number'>
            <label for='email_id' class='form-label'>Email:</label>
            <input type='email' class='form-control' id='email_id' placeholder='Enter email' value='{$row['email_id']}' name='email_id'>
            <label for='phone_number' class='form-label'>Phone Number</label>
            <input type='Number' class='form-control' id='phone_number' placeholder='Enter cell number' value='{$row['phone_number']}' name='phone_number'>
            <label for='company_name' class='form-label'>Company Name:</label>
            <input type='text' class='form-control' id='company_name' placeholder='Enter company name' value='{$row['company_name']}' name='company_name'>
            <label for='designation' class='form-label'>Designation:</label>
            <input type='text' class='form-control' id='designation' placeholder='Enter designation' value='{$row['designation']}' name='designation'>";
    $currentCountry = $row['country']; 

    $sql_country = 'SELECT * FROM country';
    $result_country = mysqli_query($con, $sql_country) or die("SQL Query Failed: " . mysqli_error($con));

    $output .= "<label for='country' class='form-label'>Country:</label>
    <select name='country' class='form-control' id='country-field'>
        <option value=''>Choose a country</option>";

    while ($row_country = mysqli_fetch_assoc($result_country)) {
        $selected = ($row_country['country'] == $currentCountry) ? "selected" : "";
        $output .= "<option value='" . $row_country['country'] . "' $selected>" . $row_country['country'] . "</option>";
    }

    $output .= "</select>";
    
    $currentCity = $row['city']; 

    $sql_city = 'SELECT * FROM city';
    $result_city = mysqli_query($con, $sql_city) or die("SQL Query Failed: " . mysqli_error($con));

    $output .= "<label for='city' class='form-label'>City:</label>
        <select name='city' class='form-control' id='city'>
            <option value=''>Choose a city</option>";

    while ($row_city = mysqli_fetch_assoc($result_city)) {
        $selected = ($row_city['city'] == $currentCity) ? "selected" : "";
        $output .= "<option value='" . $row_city['city'] . "' $selected>" . $row_city['city'] . "</option>";
    }

    $output .= "</select>";

    $currentReligion = $row['religion'];

    $sql_religion = 'SELECT * FROM religion';
    $result_religion = mysqli_query($con, $sql_religion) or die("SQL Query Failed: " . mysqli_error($con));

    $output .= "<label for='religion' class='form-label'>Religion:</label>
        <select name='religion' class='form-control' id='religion'>
            <option value=''>Choose a religion</option>";

    while ($row_religion = mysqli_fetch_assoc($result_religion)) {
        $selected = ($row_religion['religion'] == $currentReligion) ? "selected" : "";
        $output .= "<option value='" . $row_religion['religion'] . "' $selected>" . $row_religion['religion'] . "</option>";
    }

    $output .= "</select>";

    $output .= "<label for='D_O_B' class='form-label'>Date of birth:</label>
        <input type='date' class='form-control' id='D_O_B' placeholder='Enter Date of birth' value='{$row['D_O_B']}' name='D_O_B'>";


    $currentCategory = $row['category'];
    $sql_category = 'SELECT * FROM category';
    $result_category = mysqli_query($con, $sql_category) or die("SQL Query Failed: " . mysqli_error($con));

    $output .= "<label for='category' class='form-label'>Category:</label>
        <select name='category' class='form-control' id='category'>
            <option value=''>Choose a category</option>";

    while ($row_category = mysqli_fetch_assoc($result_category)) {
        $selected = ($row_category['category'] == $currentCategory) ? "selected" : "";
        $output .= "<option value='" . $row_category['category'] . "' $selected>" . $row_category['category'] . "</option>";
    }

    $output .= "</select>";

    $currentSubCategory = $row['sub_category'];

    $sql_sub_category = 'SELECT * FROM sub_category';
    $result_sub_category = mysqli_query($con, $sql_sub_category) or die("SQL Query Failed: " . mysqli_error($con));

    $output .= "<label for='sub_category' class='form-label'>Sub category:</label>
        <select name='sub_category' class='form-control' id='sub_category'>
            <option value=''>Choose a sub category</option>";

    while ($row_sub_category = mysqli_fetch_assoc($result_sub_category)) {
        $selected = ($row_sub_category['sub_category'] == $currentSubCategory) ? "selected" : "";
        $output .= "<option value='" . $row_sub_category['sub_category'] . "' $selected>" . $row_sub_category['sub_category'] . "</option>";
    }

    $output .= "</select>
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='button' class='btn btn-primary' id='save_button'>Save changes</button>
        </div>
    </form>";
} else {
    $output = "Data not found";
}

echo $output;
