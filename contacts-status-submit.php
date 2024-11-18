<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedStatus = mysqli_real_escape_string($con, $_POST['applied_status']);
    
    // Reset all statuses to 'Unapplied' in contacts_status
    $resetQuery = "UPDATE contacts_status SET applied = 'Unapplied'";
    mysqli_query($con, $resetQuery);

    // Set the selected status to 'Applied'
    $applyQuery = "UPDATE contacts_status SET applied = 'Applied' WHERE status = '$selectedStatus'";
    if (mysqli_query($con, $applyQuery)) {
        // Fetch the status value from contacts_status where applied = 'Applied'
        $fetchStatusQuery = "SELECT status FROM contacts_status WHERE applied = 'Applied' LIMIT 1";
        $result = mysqli_query($con, $fetchStatusQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $appliedStatus = $row['status'];

            // Status fetch karne ka kaam idhar khatam ho gaya
            echo "Status updated successfully in contacts_status table.";
        } else {
            echo "Error: Applied status not found in contacts_status.";
        }
    } else {
        echo "Error updating contacts_status: " . mysqli_error($con);
    }
}
?>
