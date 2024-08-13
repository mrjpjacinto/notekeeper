<?php
session_start();
include '/xampp/htdocs/notekeeper/server/db-conn.php'; // Adjust the path if necessary

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['id']; // Get the logged-in user's ID

        // Prepare SQL statement to insert the note
        $sql = "INSERT INTO notes (title, content, color, date_created, user_id) VALUES (?, ?, 'default-color', NOW(), ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $title, $content, $user_id); // Bind the parameters including user_id

            if ($stmt->execute()) {
                // Check if redirect parameter is set and redirect accordingly
                $redirectPage = isset($_POST['redirect']) ? $_POST['redirect'] : 'note-home-list.php';
                header("Location: /notekeeper/client/php/$redirectPage");
                exit();
            } else {
                // Output error message
                echo "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Output error message
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
