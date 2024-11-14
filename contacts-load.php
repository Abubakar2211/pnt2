<?php
include "db.php";

$sql = "SELECT * FROM contacts";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output = "<div class='row'>
                    <div class='mb-3 col-md-6'>
                        <label for='type' class='form-label'>Type:</label>
                        <select name='type' class='form-control' id='type' onchange='filterData()'>
                            <option value=''>Choose a type</option>";

    // Fetch types
    $sql_type = "SELECT * FROM types";
    $result_type = mysqli_query($con, $sql_type) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_type = mysqli_fetch_assoc($result_type)) {
        $output .= "<option value='" . $row_type['type'] . "'>" . $row_type['type'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='sub_type' class='form-label'>Sub type:</label>
                    <select name='sub_type' class='form-control' id='sub_type' onchange='filterData()'>
                        <option value=''>Choose a sub type</option>";

    // Fetch cities
    $sql_sub_types = "SELECT * FROM sub_types";
    $result_sub_types = mysqli_query($con, $sql_sub_types) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_sub_types = mysqli_fetch_assoc($result_sub_types)) {
        $output .= "<option value='" . $row_sub_types['sub_type'] . "'>" . $row_sub_types['sub_type'] . "</option>";
    }

    $output .= "</select></div></div>";
    $output .= '<div class="table-responsive" id="contactsTableContainer"></div>'; // Placeholder for the table
    echo $output;
} else {
    echo "<h2>No Record Found</h2>";
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // Function to fetch filtered data
    function filterData() {
        var type = $('#type').val();
        var sub_type = $('#sub_type').val();

        $.ajax({
            url: 'contacts-fetch-table.php',
            type: 'POST',
            data: { type: type, sub_type: sub_type },
            success: function(response) {
                $('#contactsTableContainer').html(response); // Display the table data
                $('#contactsTable').DataTable(); // Initialize DataTable after inserting the table
            }
        });
    }

    $(document).ready(function() {
        filterData(); // Load initial data with DataTable applied
    });

    
</script>
