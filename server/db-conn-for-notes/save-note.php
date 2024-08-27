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

        // Determine if this is an insert or update operation
        if (isset($_POST['note_id']) && !empty($_POST['note_id'])) {
            // Update existing note
            $note_id = $_POST['note_id'];
            
            // Prepare the SQL statement for updating
            $sql = "UPDATE notes SET title = ?, content = ?, date_created = NOW() WHERE id = ? AND user_id = ?";
            
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssii", $title, $content, $note_id, $user_id); // Bind parameters including user_id

                if ($stmt->execute()) {
                    // Redirect after successful update
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
            // Insert new note
            $sql = "INSERT INTO notes (title, content, color, date_created, user_id) VALUES (?, ?, 'default-color', NOW(), ?)";
            
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssi", $title, $content, $user_id); // Bind parameters including user_id

                if ($stmt->execute()) {
                    // Redirect after successful insert
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
