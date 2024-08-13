<?php
session_start(); 
include '../db-conn.php'; // Adjust the path if necessary

$user_id = $_SESSION['id']; // Get the logged-in user's ID

$sql = "SELECT id, title, content, color, date_created FROM notes WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id); // Bind the user_id parameter
    $stmt->execute();
    $result = $stmt->get_result();

    $notes = [];
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row;
    }

    echo json_encode($notes); // Return notes as JSON

    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error preparing statement: ' . $conn->error]);
}

// Close the database connection
$conn->close();
