<?php
include 'db-conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $color = $_POST['color'];

    $stmt = $conn->prepare("UPDATE notes SET title = ?, content = ?, color = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $content, $color, $id);

    if ($stmt->execute()) {
        echo "Note updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
