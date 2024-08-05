<?php
    include 'db-conn.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $color = $_POST['color'];
        $date_created = date("Y-m-d H:i:s");

        $sql = "INSERT INTO notes (title, content, color, date_created) VALUES ($title, $content, $color, $date_created";

        if($conn->query($sql) === TRUE) {
            echo"Note added";
        } else {
            echo"Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>