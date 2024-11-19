<?php
include 'db.php'; // Database connection include karein.

if (isset($_POST['type_id'])) {
    $type_id = $_POST['type_id'];

    // Sub types fetch karne ke liye SQL query
    $sql = "SELECT sub_type FROM sub_types WHERE type_id = ?";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Query preparation failed: " . $con->error);
    }

    $stmt->bind_param("i", $type_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $sub_types = [];
    while ($row = $result->fetch_assoc()) {
        $sub_types[] = $row['sub_type'];
    }

    // JSON response
    echo json_encode($sub_types);
}
?>
