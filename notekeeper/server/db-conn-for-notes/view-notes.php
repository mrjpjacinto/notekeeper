<?php
    include 'db-conn.php';

    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql);

    if($result->num_rows > o) {
        while($row = $result->fetch_assoc()) {
            echo"TItle: ", $row["title"]. " - Content: " . $row["content"]. " - Color: " .$row["color"]. " - Date: " .$row["date_created"]. "<br>";

        }
    } else {
        echo "No notes found";
    }

?>