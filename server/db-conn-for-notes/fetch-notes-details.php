<?php
include('/var/www/html/server/db-conn.php');

$id = intval($_GET['id']);
$query = "SELECT title, content FROM notes WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $note = $result->fetch_assoc();
    // Output HTML with the note title and content
    echo '<div class="view-heading"><h1>' . htmlspecialchars($note['title']) . '</h1></div>';
    echo '<div class="view-content"><p>' . nl2br(htmlspecialchars($note['content'])) . '</p></div>';
} else {
    // Output HTML for "note not found"
    echo '<div class="view-heading"><h1>Note not found</h1></div>';
    echo '<div class="view-content"><p>The note you are looking for does not exist.</p></div>';
}

$stmt->close();
$conn->close();
?>
