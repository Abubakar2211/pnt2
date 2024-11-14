<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedStatus = mysqli_real_escape_string($con, $_POST['applied_status']);
    
    $resetQuery = "UPDATE contacts_status SET applied = 'Unapplied'";
    mysqli_query($con, $resetQuery);

    $applyQuery = "UPDATE contacts_status SET applied = 'Applied' WHERE status = '$selectedStatus'";
    if (mysqli_query($con, $applyQuery)) {
        echo "Status updated successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
