<?php
include 'db-conn.php';

$sql = "SELECT * FROM notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="note-template">';
        echo '<div class="note-content">';
        echo '<div class="note-heading">';
        echo '<h1>' . htmlspecialchars($row["title"]) . '</h1>';
        echo '<div class="heading-tools">';
        echo '<span class="material-symbols-outlined">edit</span>';
        echo '<span class="material-symbols-outlined">delete</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="note-body">';
        echo htmlspecialchars($row["content"]);
        echo '</div>';
        echo '<div class="note-footer">';
        echo htmlspecialchars(date("m/d/Y H:i", strtotime($row["date_created"]))) . '<br>';
        echo htmlspecialchars(date("m/d/Y H:i", strtotime($row["date_modified"])));
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No notes found</p>';
}

$conn->close();
?>
