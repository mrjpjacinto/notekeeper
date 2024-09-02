<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
include('/var/www/html/server/db-conn.php'); // Replace with your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ids'])) {
    // Sanitize and prepare the IDs for deletion
    $ids = array_map('intval', explode(',', $_POST['ids'])); // Convert IDs to integers
    $idsList = implode(',', $ids);

    // Perform the deletion query
    $sql = "DELETE FROM notes WHERE id IN ($idsList)";
    if ($conn->query($sql) === TRUE) {
        echo "Notes deleted successfully";
    } else {
        echo "Error deleting notes: " . $conn->error;
    }
    $conn->close();
} else {
    echo "No IDs provided or invalid request method";
}
?>