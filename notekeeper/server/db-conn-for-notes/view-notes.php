<?php
    include 'db-conn.php';

    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo"Title: ", $row["title"]. " - Content: " . $row["content"]. " - Color: " .$row["color"]. " - Date: " .$row["date_created"]. "<br>";

        }
    } else {
        echo "No notes found";
    }

?>