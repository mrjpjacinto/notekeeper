<?php
session_start(); 

include '../db-conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['passwd'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname']; 
        $email = $_POST['email'];
        $passwd = password_hash($_POST['passwd'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO user (fname, lname, uname, email, passwd) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) { 
            $stmt->bind_param("sssss", $fname, $lname, $uname, $email, $passwd); 

            if ($stmt->execute()) { 
                $_SESSION['success'] = "Sign up successful!"; 

                header("Location: /notekeeper/client/php/note-signup.php");
                exit(); 
            } else {
                $_SESSION['error'] = "Error executing query: " . $stmt->error; 
            }

            $stmt->close(); 
        } else {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error; 
        }
    } else {
        $_SESSION['error'] = "Required fields are missing."; 
    }
}

$conn->close(); 
header("Location: /notekeeper/client/php/note-signup.php"); 
exit();
?>
