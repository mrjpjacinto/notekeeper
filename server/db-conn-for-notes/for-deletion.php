<?php
session_start();
include '/var/www/html/server/db-conn.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) { // Note the change to 'id'
    $noteId = $_POST['id']; // The key is now 'id' to match the FormData in JavaScript
    $user_id = $_SESSION['id']; // Ensure this session variable is correctly set

    // Prepare and execute the SQL delete statement
    $sql = "DELETE FROM notes WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $noteId, $user_id);

        if ($stmt->execute()) {
            // Successful deletion
            echo 'success';
        } else {
            // Error during deletion
            echo "Error deleting note: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        // Error preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo 'Invalid request.';
}
?>
