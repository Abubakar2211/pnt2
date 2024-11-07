<?php
session_start();
$_SESSION['form_type'] = 'type'; // Set session variable for type
include 'header.php';
include 'db.php';
?>
<!-- Include necessary CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include Bootstrap CSS if using Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<!-- Font Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="type container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Sub-Category Details</h2>

        <a href="select-csv.php"><button class="btn btn-primary">Upload CSV File</button></a>


    </div>

    <div class="form-container mb-3">
        <form action="" id="sub-category-form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-6 ">
                    <?php
                    $sql = "SELECT category FROM category";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <label for="category" class="form-label">Select Category:</label>
                        <select name="category" id="category" class="form-control">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . htmlspecialchars($row['category']) . '">' . htmlspecialchars($row['category']) . '</option>';
                            }
                            ?>
                        </select>
                    <?php
                    } else {
                        echo "No types available.";
                    }
                    ?>

                </div>
                <div class="mb-3 col-6 ">
                    <label for="sub_category" class="form-label">Enter Sub Category:</label>
                    <input type="text" class="form-control" id="sub_category" placeholder="Enter sub category" name="sub_category">
                </div>
            </div>
            <button type="submit" id="sub-category-submit" class="btn btn-primary">Submit</button>
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
    <div class="datatable-container mt-4" id="category-table">


    </div>
</div>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">type Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="categoryDetails">
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
        $('#typesTable').DataTable();

        function loadTable() {
            $.ajax({
                url: "sub-category-load.php",
                type: "POST",
                success: function(data) {
                    $('#category-table').html(data);
                    $('#typesTable').DataTable();
                }
            });
        }
        loadTable();

        $('#sub-category-submit').on("click", function(e) {
            e.preventDefault();
            var category = $("#category").val();
            var sub_category = $("#sub_category").val();

            if (category == "" ,sub_category == "") {
                $('#response').fadeIn();
                $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('All fields are required');
            } else {
                $.ajax({
                    url: "sub-category-insert.php",
                    type: "POST",
                    data: $('#sub-category-form').serialize(),
                    success: function(data) {
                        $('#sub-category-form')[0].reset();
                        loadTable();
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
                var sub_categoryId = $(this).data('id');
                var element = this;
                $.ajax({
                    url: "sub-category-delete.php",
                    type: "POST",
                    data: {
                        id: sub_categoryId
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
            var typeId = $(this).data("eid");

            $("#update-modal .modal-content").html("");
            $("#update-modal").modal('show');

            $.ajax({
                url: "sub-category-update-form.php",
                type: "POST",
                data: {
                    id: typeId
                },
                success: function(data) {
                    $("#update-modal .modal-content").html(data);
                },

            });
        });

        $(document).on("click", "#save_button", function() {
            var formData = $('#update-form').serialize();

            $.ajax({
                url: "sub-category-update.php",
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

    });
</script>