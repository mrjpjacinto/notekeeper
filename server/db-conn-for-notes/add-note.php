<?php
session_start(); 

include '../db-conn.php'; // Adjust the path if necessary

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        // Prepare SQL statement to insert the note
        $sql = "INSERT INTO notes (title, content, color, date_created) VALUES (?, ?, 'default-color', NOW())";
        if ($stmt = $conn->prepare($sql)) { 
            $stmt->bind_param("ss", $title, $content); 

            if ($stmt->execute()) { 
                // Redirect to the notes list page on successful insertion
                $_SESSION['success'] = "Note saved successfully!";
                header("Location: /notekeeper/client/php/note-home-list.php");
                exit(); 
            } else {
                $_SESSION['error'] = "Error executing query: " . $stmt->error; 
            }

            $stmt->close(); 
        } else {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error; 
        }
    } else {
        $_SESSION['error'] = "Required fields are missing."; 
    }
}

// Close the database connection
$conn->close(); 

// Redirect to the notes list page
header("Location: /notekeeper/client/php/note-home-list.php"); 
exit();
?>
