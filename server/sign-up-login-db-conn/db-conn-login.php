<?php
session_start();
include '../db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uname']) && isset($_POST['passwd'])) {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];

        $sql = "SELECT * FROM user WHERE uname=?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $uname);

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if (password_verify($passwd, $row['passwd'])) {
                        // Set session variables
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['fname'] = $row['fname'];  // Store first name
                        $_SESSION['lname'] = $row['lname'];  // Store last name
                        $_SESSION['email'] = $row['email'];  // Store email
                        $_SESSION['success'] = "Login successful!";
                        
                        // Redirect to the homepage
                        header("Location: /notekeeper/client/php/note-home-list.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Invalid password";
                    }
                } else {
                    $_SESSION['error'] = "No user found with this username";
                }
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
header("Location: /notekeeper/client/php/note-login.php");
exit();
?>
