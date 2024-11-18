<?php
include "db.php";
$sql = "SELECT * FROM contacts";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output = "
    <!-- Form 2: Selecting an Applied Status -->
    <div class='form-container mb-3 '>
        <form action='' id='select-status-form' method='post' enctype='multipart/form-data' class='p-3 border rounded'>
            <div class='row'>
                <div class='mb-3'>
                    <label for='applied_status' class='form-label'>Applied Status:</label>
                    <select name='applied_status' class='form-control' id='applied_status'>
                        <option value='' disabled selected>Choose Your Status</option>";
        
    // Add options dynamically from the database
    $sql_status = 'SELECT * FROM contacts_status';
    $result = mysqli_query($con, $sql_status);
    while ($status_data = mysqli_fetch_assoc($result)) {
        $output .= "<option value='" . $status_data['status'] . "'>" . $status_data['status'] . "</option>";
    }

    $output .= "
                    </select>
                </div>
            </div>
            <button type='submit' id='select-status-submit' class='btn btn-primary'>Submit</button>
        </form>
    </div>";

    $output .= "<div class='row'>
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
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    // Function to load filtered data
    function filterData() {
        var type = $('#type').val();
        var sub_type = $('#sub_type').val();

        $.ajax({
            url: 'contacts-fetch-table.php',
            type: 'POST',
            data: { type: type, sub_type: sub_type },
            success: function (response) {
                $('#contactsTableContainer').html(response);
                $('#contactsTable').DataTable(); // Reinitialize DataTable
            },
        });
    }

    // Initialize filter data on page load
    filterData();

    // Handle filter change
    $('#type, #sub_type').on('change', function () {
        filterData(); // Reload table on filter change
    });

    // Delete functionality
    $(document).on('click', '.delete-btn', function () {
        if (confirm('Do you really want to delete this record?')) {
            var contactId = $(this).data('id');
            var element = this;

            $.ajax({
                url: 'contacts-delete.php',
                type: 'POST',
                data: { id: contactId },
                success: function (data) {
                    if (data == 1) {
                        $(element).closest('tr').fadeOut();
                        filterData(); // Reload table without refresh
                    } else {
                        alert("Can't delete the record.");
                    }
                },
            });
        }
    });

    // Edit functionality
    $(document).on('click', '.edit-btn', function () {
        var contactId = $(this).data('eid');
        $('#update-modal .modal-content').html('');
        $('#update-modal').modal('show');

        $.ajax({
            url: 'contacts-update-form.php',
            type: 'POST',
            data: { id: contactId },
            success: function (data) {
                $('#update-modal .modal-content').html(data);
            },
        });
    });

    // Save updated data
    $(document).on('click', '#save_button', function () {
        var formData = $('#update-form').serialize();

        $.ajax({
            url: 'contacts-update.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data == 1) {
                    $('#update-modal').modal('hide');
                    filterData(); // Reload table without refresh
                } else {
                    alert('Error updating contact data.');
                }
            },
        });
    });

    // Status update
    $(document).on('change', '.status-dropdown', function () {
        var status = $(this).val();
        var contactId = $(this).data('id');

        $.ajax({
            url: 'contacts-status-update.php',
            type: 'POST',
            data: { id: contactId, status: status },
            success: function (data) {
                if (data == 1) {
                    alert('Status updated successfully!');
                    filterData(); // Reload table to reflect updated status
                } else {
                    alert('Failed to update status.');
                }
            },
        });
    });
});

</script>
<?php
include("footer.php");
?>