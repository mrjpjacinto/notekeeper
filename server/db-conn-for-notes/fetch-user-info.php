<?php
include '/xampp/htdocs/notekeeper/server/db-conn.php';

// Ensure the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: /notekeeper/client/php/note-login.php");
    exit();
}

// Fetch user info from the database
$sql = "SELECT fname, lname, email FROM user WHERE id=?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $_SESSION['id']);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Set session variables
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
        } else {
            // Handle case where no user is found
            $_SESSION['error'] = "User not found.";
        }
    } else {
        $_SESSION['error'] = "Error executing query: " . $stmt->error;
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Error preparing statement: " . $conn->error;
}

$conn->close();
?>
