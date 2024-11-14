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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Contacts Details</h2>

        <a href="select-csv.php"><button class="btn btn-primary">Upload CSV File</button></a>


    </div>

    <div class="form-container mb-3">
        <form action="" id="contact-form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-6 col-md-6 mb-4">
                    <?php
                    $sql_type = "SELECT * FROM types";
                    $result_type = mysqli_query($con, $sql_type);
                    ?>
                    <label for="types" class="form-label">Type:</label>
                    <select name="types" class="form-control" id="types">
                        <option value="">Choose a country</option>
                        <?php
                        while ($row_type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $row_type['type'] . '">' . $row_type['type'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-6 col-md-6 mb-4">
                    <?php
                    $sql_type = "SELECT * FROM sub_types";
                    $result_type = mysqli_query($con, $sql_type);
                    ?>
                    <label for="sub_types" class="form-label">Sub types:</label>
                    <select name="sub_types" class="form-control" id="sub_types">
                        <option value="">Choose a country</option>
                        <?php
                        while ($row_type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $row_type['sub_type'] . '">' . $row_type['sub_type'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first_name" placeholder="Enter first name"
                        name="first_name">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name"
                        name="last_name">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="designation" class="form-label">Designation:</label>
                    <input type="text" class="form-control" id="designation" placeholder="Enter designation"
                        name="designation">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="email_id" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email_id" placeholder="Enter email" name="email_id">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="cell_number" class="form-label">Cell Number</label>
                    <input type="text" class="form-control" id="cell_number" placeholder="Enter cell number"
                        name="cell_number">
                </div>

                <div class="mb-3 col-md-4 ">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Enter cell number"
                        name="phone_number">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="company_name" class="form-label">Company Name:</label>
                    <input type="text" class="form-control" id="company_name" placeholder="Enter company name"
                        name="company_name">
                </div>
                <div class="mb-3 col-md-4 ">
                    <?php
                    $sql_category = "SELECT * FROM category";
                    $result_category = mysqli_query($con, $sql_category);
                    ?>
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" class="form-control" id="category">
                        <option value="">Choose a category</option>
                        <?php
                        while ($row_city = mysqli_fetch_assoc($result_category)) {
                            echo '<option value="' . $row_city['category'] . '">' . $row_city['category'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3 col-md-4 ">
                    <?php
                    $sql_sub_category = "SELECT * FROM sub_category";
                    $result_sub_category = mysqli_query($con, $sql_sub_category);
                    ?>
                    <label for="sub_category" class="form-label">Sub category:</label>
                    <select name="sub_category" class="form-control" id="sub_category">
                        <option value="">Choose a sub category</option>
                        <?php
                        while ($row_city = mysqli_fetch_assoc($result_sub_category)) {
                            echo '<option value="' . $row_city['sub_category'] . '">' . $row_city['sub_category'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="website" class="form-label">Website:</label>
                    <input type="text" class="form-control" id="website" placeholder="Enter website" name="website">
                </div>

                <div class="mb-3 col-md-4 ">
                    <?php
                    $sql_country = "SELECT * FROM country";
                    $result_country = mysqli_query($con, $sql_country);
                    ?>
                    <label for="country" class="form-label">Country:</label>
                    <select name="country" class="form-control" id="country-field">
                        <option value="">Choose a country</option>
                        <?php while ($row_country = mysqli_fetch_assoc($result_country)) {
                            echo '<option value="' . $row_country['country'] . '">' . $row_country['country'] . '</option>';
                        } ?>
                    </select>

                </div>
                <div class="mb-3 col-md-4 ">
                    <?php
                    $sql_city = "SELECT * FROM city";
                    $result_city = mysqli_query($con, $sql_city);
                    ?>
                    <label for="city" class="form-label">City:</label>
                    <select name="city" class="form-control" id="city">
                        <option value="">Choose a city</option>
                        <?php
                        while ($row_city = mysqli_fetch_assoc($result_city)) {
                            echo '<option value="' . $row_city['city'] . '">' . $row_city['city'] . '</option>';
                        }
                        ?>
                    </select>

                </div>

                <div class="mb-3 col-md-4 ">
                    <label for="D_O_B" class="form-label">Date of birth:</label>
                    <input type="date" class="form-control" id="D_O_B" placeholder="Enter Date of bith" name="D_O_B">
                </div>
                <div class="mb-3 col-md-4 ">
                    <?php
                    $sql_religion = "SELECT * FROM religion";
                    $result_religion = mysqli_query($con, $sql_religion);
                    ?>
                    <label for="religion" class="form-label">Religion:</label>
                    <select name="religion" class="form-control" id="religion">
                        <option value="">Choose a religion</option>
                        <?php
                        while ($row_city = mysqli_fetch_assoc($result_religion)) {
                            echo '<option value="' . $row_city['religion'] . '">' . $row_city['religion'] . '</option>';
                        }
                        ?>
                    </select>

                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="facebook" class="form-label">Facebook:</label>
                    <input type="text" class="form-control" id="facebook" placeholder="Enter facebook" name="facebook">
                </div>
            </div>

            <button type="submit" id="contact-submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response" class="my-2"></div>

    </div>

    <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
    $(document).ready(function () {
        $('#contactsTable').DataTable();

        function loadTable() {
            $.ajax({
                url: "contacts-load.php",
                type: "POST",
                success: function (data) {
                    $('#contact-table').html(data);
                    $('#contactsTable').DataTable();
                }
            });
        }
        loadTable();

        $('#contact-submit').on("click", function (e) {
            e.preventDefault();
            var types = $("#types").val();
            var sub_types = $("#sub_types").val();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var designation = $("#designation").val();
            var email_id = $("#email_id").val();
            var cell_number = $("#cell_number").val();
            var phone_number = $("#phone_number").val();
            var company_name = $("#company_name").val();
            var category = $("#category").val();
            var sub_category = $("#sub_category").val();
            var website = $("#website").val();
            var country_field = $("#country-field").val(); // Fixed variable name
            var city = $("#city").val();
            var D_O_B = $("#D_O_B").val();
            var religion = $("#religion").val();
            var facebook = $("#facebook").val();

            // Basic Validation
            if (types == "" || sub_types == "" || first_name == "" || last_name == "" || designation == "" || email_id == "" || cell_number == "" || phone_number == "" || company_name == "" || category == "" || sub_category == ""
                || website == "" || country_field == "" || city == "" || D_O_B == "" || religion == "" || facebook == "") {
                $('#response').fadeIn();
                $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('All fields are required');
            } else {
                $.ajax({
                    url: "contacts-insert.php",
                    type: "POST",
                    data: $('#contact-form').serialize(),
                    success: function (data) {
                        $('#contact-form')[0].reset();
                        loadTable();
                        $('#response').fadeIn();
                        $('#response').removeClass('alert alert-danger').addClass('alert alert-primary').html(data);
                        setTimeout(function () {
                            $('#response').fadeOut("slow");
                        }, 4000);
                    },
                    error: function (xhr, status, error) {
                        $('#response').fadeIn();
                        $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('Error occurred, try again!');
                    }
                });
            }
        });

        $(document).on("click", ".delete-btn", function () {
            if (confirm("Do you really want to delete this record")) {
                var contactId = $(this).data('id');
                var element = this;
                $.ajax({
                    url: "contacts-delete.php",
                    type: "POST",
                    data: {
                        id: contactId
                    },
                    success: function (data) {
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
        $(document).on("click", ".edit-btn", function () {
            var contactId = $(this).data("eid");

            $("#update-modal .modal-content").html("");
            $("#update-modal").modal('show');

            $.ajax({
                url: "contacts-update-form.php",
                type: "POST",
                data: {
                    id: contactId
                },
                success: function (data) {
                    $("#update-modal .modal-content").html(data);
                },

            });
        });

        $(document).on("click", "#save_button", function () {
            var formData = $('#update-form').serialize();

            $.ajax({
                url: "contacts-update.php",
                type: "POST",
                data: formData,
                success: function (data) {
                    if (data == 1) {
                        $("#update-modal").modal('hide');
                        loadTable();
                    } else {
                        alert("Error updating type data: " + data);
                    }
                },

            });
        });

    });


</script>