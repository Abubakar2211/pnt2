<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contactId = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Reset all statuses to 'Unapplied'
    $resetQuery = "UPDATE contacts_status SET applied = 'Unapplied'";
    mysqli_query($con, $resetQuery);

    // Update the selected contact's status
    $updateQuery = "UPDATE contacts SET status = '{$status}' WHERE id = '{$contactId}'";

    if (mysqli_query($con, $updateQuery)) {
        // Set the selected status as 'Applied'
        $applyQuery = "UPDATE contacts_status SET applied = 'Applied' WHERE status = '{$status}'";
        mysqli_query($con, $applyQuery);

        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}
?>
