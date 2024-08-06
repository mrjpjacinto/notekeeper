<?php
    include 'db-conn.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $color = $_POST['color'];

        $sql = "INSERT INTO notes (title, content, color, date_created) VALUES ('$title', '$content', '$color', NOW())";
        $stmt->bind_param("sss", $title, $content, $color);

        if($stmt->execute()) {
            echo"Note added";
        } else {
            echo"Error: " . $stmt->error;
        }
    }
?>