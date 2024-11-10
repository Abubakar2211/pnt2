<?php

include "db.php";

$sql = "SELECT * FROM contacts";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {

    $output = '<div class="table-responsive">
            <table id="contactsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Cell Number</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Phone Number</th>
                        <th>Designation</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Religion</th>
                        <th>Date of birth</th>
                        <th>Category</th>
                        <th>Sub category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$i}</td>
        <td>" . htmlspecialchars($row['first_name']) . "</td>
        <td>" . htmlspecialchars($row['last_name']) . "</td>
        <td>" . htmlspecialchars($row['cell_number']) . "</td>
        <td>" . htmlspecialchars($row['email_id']) . "</td>
        <td>" . htmlspecialchars($row['phone_number']) . "</td>
        <td>" . htmlspecialchars($row['company_name']) . "</td>
        <td>" . htmlspecialchars($row['designation']) . "</td>
        <td>" . htmlspecialchars($row['country']) . "</td>
        <td>" . htmlspecialchars($row['city']) . "</td>
        <td>" . htmlspecialchars($row['religion']) . "</td>
        <td>" . htmlspecialchars($row['D_O_B']) . "</td>
        <td>" . htmlspecialchars($row['category']) . "</td>
        <td>" . htmlspecialchars($row['sub_category']) . "</td>
      <td>
            <button class='btn  btn-sm mx-2 edit-btn' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
        </td>
        <td>
            <button class='delete-btn btn  btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left' ></i></button>
        </td>
    </tr>";
        $i++;
    }

    $output .= '</tbody></table></div>';
    echo $output;
} else {
    echo "<h2>No Record Found</h2>";
}
