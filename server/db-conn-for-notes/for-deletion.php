<?php
// Include your existing database connection script
include '/xampp/htdocs/notekeeper/server/db-conn.php';

if (isset($_POST['id'])) {
    $noteId = $_POST['id'];

    // Prepare and execute the SQL delete statement
    $sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $noteId);

    if ($stmt->execute()) {
        echo "Note deleted successfully.";
    } else {
        echo "Error deleting note: " . $conn->error;
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>
