<?php
include 'db_conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo"Note deleted";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>