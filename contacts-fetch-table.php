<?php
include "db.php";

$type = isset($_POST['type']) ? $_POST['type'] : '';
$sub_type = isset($_POST['sub_type']) ? $_POST['sub_type'] : '';

$sql = "SELECT * FROM contacts WHERE 1=1";

if ($type != '') {
    $sql .= " AND type = '" . mysqli_real_escape_string($con, $type) . "'";
}
if ($sub_type != '') {
    $sql .= " AND sub_type = '" . mysqli_real_escape_string($con, $sub_type) . "'";
}

$result = mysqli_query($con, $sql) or die("Query Failed: " . mysqli_error($con));


$output = '<table id="contactsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Cell Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th> <!-- Single Action column for both buttons -->
                    </tr>
                </thead>
                <tbody>';

if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td>{$i}</td>
            <td>" . htmlspecialchars($row['first_name']) . "</td>
            <td>" . htmlspecialchars($row['cell_number']) . "</td>
            <td>" . htmlspecialchars($row['email_id']) . "</td>
            <td>" . htmlspecialchars($row['status']) . "</td>
            <td class='d-flex justify-content-around'>  
                <button class='edit-btn btn btn-sm' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
                <button class='delete-btn btn btn-sm ' data-id='{$row['id']}'><i class='fa-solid fa-delete-left'></i></button>
            </td>
        </tr>";
        $i++;
    }
} else {
    $output .= "<tr><td colspan='6'>No Record Found</td></tr>";
}
$output .= '</tbody></table>';
echo $output;
?>