<?php
session_start();
include 'db.php'; // Database connection

$csvData = $_SESSION['csv_data'] ?? [];
$mapping = $_POST['mapping'] ?? [];
$formType = $_SESSION['form_type'] ?? 'contact';

if (empty($csvData) || empty($mapping)) {
    echo "No data to insert.";
    exit;
}

$tableName = $formType === 'client' ? 'clients' : 'contacts'; // Choose the correct table based on form type

foreach ($csvData as $index => $row) {
    $insertData = [];
    
    foreach ($mapping as $csvIndex => $dbField) {
        if (!empty($dbField) && isset($row[$csvIndex])) {
            $value = trim($row[$csvIndex]);
            if (!empty($value)) {
                $insertData[$dbField] = mysqli_real_escape_string($con, $value);
            }
        }
    }

    if (empty($insertData)) {
        continue; // Skip empty insert
    }

    // Enclose field names in backticks if needed
    $columns = implode(", ", array_map(function($field) {
        return '`' . $field . '`'; // Enclose in backticks
    }, array_keys($insertData)));

    $values = implode(", ", array_map(function($value) {
        return "'" . $value . "'";
    }, array_values($insertData)));

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
    
    if (!mysqli_query($con, $query)) {
        echo "Error inserting data: " . mysqli_error($con);
        exit;
    }
}

// Clear the session data
session_unset();
session_destroy(); // Destroy the session

// Redirect based on form type
$redirectUrl = $formType === 'client' ? 'clients.php' : 'add-contacts.php';
header("Location: $redirectUrl");
exit;

include 'footer.php'; // This line will never be executed due to exit after header
