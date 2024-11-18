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
                        <th>S.s</th>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Cell Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td><input type='checkbox' class='record-checkbox' value='" . $row['id'] . "'></td>
            <td>{$i}</td>
            <td>" . htmlspecialchars($row['first_name']) . "</td>
            <td>" . htmlspecialchars($row['cell_number']) . "</td>
            <td>" . htmlspecialchars($row['email_id']) . "</td>";
        $output .= "<td>
            <select name='status' class='status-dropdown form-control' data-id='{$row['id']}'>";

        $status_query = "SELECT * FROM contacts_status";
        $status_result = mysqli_query($con, $status_query);

        if (mysqli_num_rows($status_result) > 0) {
            while ($status_row = mysqli_fetch_assoc($status_result)) {
                $selected = $row['status'] == $status_row['status'] ? 'selected' : '';
                $output .= "<option value='" . htmlspecialchars($status_row['status']) . "' $selected>" . htmlspecialchars($status_row['status']) . "</option>";
            }
        } else {
            $output .= "<option value=''>No Status Found</option>";
        }

        $output .= "</select>
        </td>";



        $output .= "
            <td class='d-flex justify-content-around'>
                <button class='edit-btn btn btn-sm' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
                <button class='delete-btn btn btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left'></i></button>
            </td>
        </tr>";
        $i++;
    }
} else {
    $output .= "<tr><td colspan='7'>No Record Found</td></tr>";
}
$output .= '</tbody></table>';
echo $output;
