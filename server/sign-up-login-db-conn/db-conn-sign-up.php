<?php
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (fname, lname, uname, email, passwd) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $uname, $email, $passwd);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
