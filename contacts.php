<?php
session_start();
$_SESSION['form_type'] = 'contact'; // Set session variable for contact
include 'header.php';
include 'db.php';
?>
<!-- Include necessary CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include Bootstrap CSS if using Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<!-- Font Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Contacts Details</h2>

        <a href="select-csv.php"><button class="btn btn-primary">Upload CSV File</button></a>


    </div>

    <div class="form-container mb-3">
        <form action="" id="contact-form" method="post" enctype="multipart/form-data">
            <div class="select-type my-3">
                <h5>Select Your Type</h5>
                <select name="type" id="type" class="form-control col-4">
                    <option value="team">Team</option>
                    <option value="supplier">Supplier</option>
                    <option value="client">Client</option>
                </select>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4 ">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="Number" class="form-control" id="contact" placeholder="Enter contact" name="contact">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="cellPhone" class="form-label">Cell Phone</label>
                    <input type="Number" class="form-control" id="cellPhone" placeholder="Enter Cell Phone" name="cellPhone">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="cellNumber" class="form-label">Cell Number</label>
                    <input type="Number" class="form-control" id="cellNumber" placeholder="Enter Cell Number" name="cellNumber">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="joining" class="form-label">Joining</label>
                    <input type="date" class="form-control" id="joining" placeholder="Enter joining" name="joining">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Enter companyName" name="companyName">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="contactStatus" class="form-label">Contact Status</label>
                    <select name="contactStatus" class="form-control" id="contactStatus">
                        <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                    </select>
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="contactBoardcast" class="form-label">Contact Boardcast</label>
                    <select name="contactBoardcast" class="form-control" id="contactBoardcast">
                        <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" id="contact-submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response" class="my-2"></div>

    </div>

    <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be dynamically loaded here -->
            </div>
        </div>
    </div>


    <!-- Display DataTable -->
    <div class="datatable-container mt-4" id="contact-table">


    </div>
</div>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Contact Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="contactDetails">
                <!-- Details will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!-- Include necessary JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactsTable').DataTable();

        function loadTable() {
            $.ajax({
                url: "contacts-load.php",
                type: "POST",
                success: function(data) {
                    $('#contact-table').html(data);
                    $('#contactsTable').DataTable();
                }
            });
        }
        loadTable();

        $('#contact-submit').on("click", function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var cellPhone = $("#cellPhone").val();
            var cellNumber = $("#cellNumber").val();
            var joining = $("#joining").val();
            var companyName = $("#companyName").val();
            var contactStatus = $("#contactStatus").val();
            var contactBoardcast = $("#contactBoardcast").val();

            if (name == "" || email == "" || contact == "" || cellPhone == "" || cellNumber == "" || joining == "" || companyName == "" || contactStatus == "" || contactBoardcast == "") {
                $('#response').fadeIn();
                $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('All fields are required');
            } else {
                $.ajax({
                    url: "contacts-insert.php",
                    type: "POST",
                    data: $('#contact-form').serialize(),
                    success: function(data) {
                        $('#contact-form')[0].reset();
                        loadTable(); // Ensure this function is defined
                        $('#response').fadeIn();
                        $('#response').removeClass('alert alert-danger').addClass('alert alert-primary').html(data);
                        setTimeout(function() {
                            $('#response').fadeOut("slow");
                        }, 4000);
                    },
                    error: function(xhr, status, error) {
                        $('#response').fadeIn();
                        $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });


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
                            $("#error_message").html("Can't Delete Record.").slideDown();
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
                        alert("Error updating contact data: " + data);
                    }
                },

            });
        });

    });
</script>