<?php
include "db.php";

$sql_type = "SELECT * FROM types";
$result_type = mysqli_query($con, $sql_type);

$sql_sub_types = "SELECT * FROM sub_types";
$result_sub_types = mysqli_query($con, $sql_sub_types);

$sql_status = "SELECT * FROM contacts_status";
$result_status = mysqli_query($con, $sql_status);
?>

<!-- Bulk Status Update -->
<div class="bulk-status-update mb-3">
    <select id="bulk-status-dropdown" class="form-control d-inline w-auto">
        <option value="" disabled selected>Choose Status</option>
        <?php while ($row = mysqli_fetch_assoc($result_status)) : ?>
            <option value="<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></option>
        <?php endwhile; ?>
    </select>
    <button id="bulk-update-btn" class="btn btn-primary">Update Selected</button>
</div>

<!-- Dropdown Filters -->
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="type" class="form-label">Type:</label>
        <select name="type" class="form-control" id="type">
            <option value="">Choose a type</option>
            <?php while ($row = mysqli_fetch_assoc($result_type)) : ?>
                <option value="<?= $row['type'] ?>"><?= $row['type'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3 col-md-6">
        <label for="sub_type" class="form-label">Sub Type:</label>
        <select name="sub_type" class="form-control" id="sub_type">
            <option value="">Choose a sub type</option>
            <?php while ($row = mysqli_fetch_assoc($result_sub_types)) : ?>
                <option value="<?= $row['sub_type'] ?>"><?= $row['sub_type'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
</div>

<!-- Table Placeholder -->
<div class="table-responsive" id="contactsTableContainer">
    <!-- Table data will be loaded here via AJAX -->
</div>

<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).on("click", ".delete-btn", function() {
        if (confirm("Do you really want to delete this record")) {
            var contactId = $(this).data('id');
            var element = this;
            $.ajax({
                url: "contacts-delete.php",
                type: "POST",
                data: {
                    id: contactId
                },
                success: function(data) {
                    if (data == 1) {
                        $(element).closest("tr").fadeOut();
                        loadTable();
                    } else {
                        $("#error_message").html("Can't Delete Record .").slideDown();
                        $("#success_message").slideUp();
                    }
                }
            })
        }
    });
    $(document).on("click", ".edit-btn", function() {
        var contactId = $(this).data("eid");

        $("#update-modal .modal-content").html("");
        $("#update-modal").modal('show');

        $.ajax({
            url: "contacts-update-form.php",
            type: "POST",
            data: {
                id: contactId
            },
            success: function(data) {
                $("#update-modal .modal-content").html(data);
            },

        });
    });

    $(document).on("click", "#save_button", function() {
        var formData = $('#update-form').serialize();

        $.ajax({
            url: "contacts-update.php",
            type: "POST",
            data: formData,
            success: function(data) {
                if (data == 1) {
                    $("#update-modal").modal('hide');
                    loadTable();
                } else {
                    alert("Error updating type data: " + data);
                }
            },

        });
    });

// Function to fetch filtered data
function filterData() {
    var type = $('#type').val();
    var sub_type = $('#sub_type').val();
    $.ajax({
        url: 'contacts-fetch-table.php',
        type: 'POST',
        data: {
            type: type,
            sub_type: sub_type
        },
        success: function(response) {
            $('#contactsTableContainer').html(response); // Load table data
            
            // Initialize or reinitialize DataTable
            if ($.fn.DataTable.isDataTable('#contactsTable')) {
                $('#contactsTable').DataTable().destroy();
            }
            $('#contactsTable').DataTable(); // Reinitialize DataTable
        }
    });
}

// Attach filter change events
$(document).ready(function () {
    filterData(); // Load initial data

    $('#type, #sub_type').change(function () {
        filterData(); // Re-fetch data on filter change
    });
});


    
</script>
<?php
include("footer.php");
?>